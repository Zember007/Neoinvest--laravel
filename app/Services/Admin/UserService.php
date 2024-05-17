<?php

namespace App\Services\Admin;

use App\Models\Log;
use App\Models\PacketOption;
use App\Models\Transaction;
use App\Models\User;
use App\Services\LoggerService;
use Illuminate\Support\Arr;

class UserService
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function show(User $user): array
    {
        $user->load([
            'packets' => function ($query) {
                $query->withTrashed();
            }
        ]);
        $packetOptions = PacketOption::all();
        $referrals = $user
            ->referrals()
            ->with('referred.star')
            ->get()
            ->groupBy('level')
            ->mapWithKeys(function ($items, $level) {
                return [$level => $items->pluck('referred')];
            });
        $transactions = $user->transactions()->withoutCreated()->latest()->get();
        $packetIncomeTransactions = $user->packetsTransactions()->income()->get();
        $replenishTotal = $user->transactions()->replenishes()->successful()->sum('amount');
        $withdrawTotal = $user->transactions()->withdraws()->successful()->sum('amount');
        $transfers = $user->transactions()->transfers()->successful()->get();
        $transferUserIds = $transfers->pluck('payload.receiver_id')
            ->merge($transfers->pluck('payload.sender_id'))
            ->filter(fn($id) => !is_null($id))
            ->unique()
            ->values()
            ->all();
        $transferUsers = User::query()
            ->whereIn('id', $transferUserIds)
            ->get();
        $starTransactions = $user
            ->starTransactions()
            ->with('referred', 'referral')
            ->get()
            ->map(function ($transaction) {
                return collect([
                    'referred_name' => $transaction->referred->full_name,
                    'amount' => $transaction->amount,
                    'created_at' => $transaction->created_at,
                ]);
            });
        $starBonuses = $user
            ->transactions()
            ->starBonus()
            ->get()
            ->map(function ($transaction) {
                return collect([
                    'referred_name' => trans('general.system'),
                    'amount' => $transaction->amount,
                    'created_at' => $transaction->created_at,
                ]);
            });
        $bonuses = collect()
            ->merge($starTransactions)
            ->merge($starBonuses)
            ->sortByDesc('created_at')
            ->values();

        return [
            $user->packets,
            $packetOptions,
            $referrals,
            $transactions,
            $packetIncomeTransactions,
            $bonuses,
            $replenishTotal,
            $withdrawTotal,
            $transferUsers,
        ];
    }

    public function update(User $user, array $data)
    {
        $login = $user->hasEmailFilled()
            ? ['email' => $data['login']]
            : ['phone' => $data['login']];
        $before = $this->getDetails($user);

        $user->update(array_merge(Arr::only($data, ['first_name', 'last_name', 'country']), $login));

        $user->syncRoles($data['role']);

        if ($data['is_verified']) {
            if (!$user->isVerified()) {
                $user->markAsVerified();
            }
        } else {
            $user->markAsUnverified();
        }

        if ($user->balance !== (float) $data['balance']) {
            $this->updateBalance($user, $data);
        }

        $user->refresh();
        $after = $this->getDetails($user);

        $changesBefore = Arr::except(array_diff_assoc($before, $after), ['updated_at']);
        $changesAfter = Arr::except(array_diff_assoc($after, $before), ['updated_at']);

        $payload = array_merge(
            ['user_before' => $changesBefore],
            ['user_after' => $changesAfter],
            [
                'is_update' => true,
                'user_id' => $user->id,
            ]);

        $this->loggerService->logAdmin(Log::ADMIN_UPDATE_USER, $payload);
    }

    private function getDetails(User $user)
    {
        $details = $user->getAttributes();
        $details['role'] = $user->roles()->first()->name;
        $details['is_verified'] = $user->isVerified();

        return $details;
    }

    private function updateBalance(User $user, array $data)
    {
        $oldBalance = $user->balance;
        $transaction = $user->transactions()->create([
            'type' => Transaction::TYPE_ADMIN,
            'amount' => (float) $data['balance'] - $user->balance,
            'status' => 'success',
        ]);

        $user->forgetCachedBalance();
        $newBalance = $user->balance;

        $this->loggerService->log(Log::ADMIN_CHANGE_BALANCE, $user, [
            'old_balance' => $oldBalance,
            'new_balance' => $newBalance,
            'transaction_id' => $transaction->id,
            'admin_id' => auth()->id(),
        ]);
        $this->loggerService->logAdmin(Log::ADMIN_CHANGE_BALANCE, [
            'old_balance' => $oldBalance,
            'new_balance' => $newBalance,
            'user_id' => $user->id,
            'transaction_id' => $transaction->id,
        ]);
    }

    public function ban(User $user)
    {
        $user->update([
            'is_banned' => true,
        ]);
        $this->loggerService->logAdmin(Log::ADMIN_BAN_USER, [
            'user_id' => $user->id,
        ]);
    }

    public function unban(User $user)
    {
        $user->update([
            'is_banned' => false,
        ]);
        $this->loggerService->logAdmin(Log::ADMIN_UNBAN_USER, [
            'user_id' => $user->id,
        ]);
    }
}
