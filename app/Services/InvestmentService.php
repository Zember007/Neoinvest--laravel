<?php

namespace App\Services;

use App\Events\PacketInvestmentCompleted;
use App\Models\Log;
use App\Models\Packet;
use App\Models\PacketOption;
use App\Models\PacketTransaction;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

class InvestmentService
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function invest(User $user, array $data): RedirectResponse
    {
        $packetOption = PacketOption::find($data['packet_option_id']);
        $packet = $user->packets()->create([
            'packet_option_id' => $data['packet_option_id'],
            'percentage' => $packetOption->percentage,
            'expires_at' => $packetOption->is_indefinite
                ? null
                : now()->addDays($packetOption->duration_days)->startOfDay(),
        ]);
        $this->addInvestment($user, $packet, $data);

        session()->flash('success', trans('investments.purchased_successfully'));

        return back();
    }

    public function reinvest(User $user, array $data): RedirectResponse
    {
        $packet = Packet::find($data['packet_id']);
        $this->addInvestment($user, $packet, $data, true);

        session()->flash('success', trans('investments.reinvested_successfully'));

        return back();
    }

    public function close(User $user, array $data): RedirectResponse
    {
        $packet = Packet::query()
            ->withSum([
                'transactions' => function ($query) {
                    $query->invest();
                }
            ], 'amount')
            ->find($data['packet_id']);
        $packet->delete();

        $this->loggerService->log(Log::PACKET_CLOSE, $user, [
            'packet_option_id' => $packet->packetOption->id,
            'sum' => $packet->transactions_sum_amount,
        ]);

        session()->flash('success', trans('investments.closed_successfully'));

        return back();
    }

    private function addInvestment(User $user, Packet $packet, array $data, bool $isReinvest = false)
    {
        $oldBalance = $user->balance;
        $transaction = $packet->transactions()->create([
            'type' => PacketTransaction::TYPE_INVEST,
            'amount' => $data['amount'],
        ]);

        $user->forgetCachedBalance();
        $newBalance = $user->balance;
        event(new PacketInvestmentCompleted($user, $transaction));

        $this->loggerService->log(
            $isReinvest ? Log::PACKET_REINVEST : Log::PACKET_INVEST,
            $user,
            [
                'old_balance' => $oldBalance,
                'new_balance' => $newBalance,
                'packet_option_id' => $packet->packetOption->id,
            ]);
    }

    public function getHistory(User $user): Collection
    {
        $packets = $user->packets()->withTrashed()->with('packetOption')->get();
        $packetsTransactions = $user
            ->packetsTransactions()
            ->whereIn('type',
                [PacketTransaction::TYPE_INVEST, PacketTransaction::TYPE_INCOME, PacketTransaction::TYPE_REFUND])
            ->with('packet')
            ->get();
        $userBonuses = $user
            ->transactions()
            ->whereIn('type', [Transaction::TYPE_MONTHLY_TURNOVER_BONUS])
            ->get();

        $packetsTransactions->transform(function ($transaction) use ($packets) {
            $packet = $packets->where('id', $transaction->packet_id)->first();
            $packetName = trans('investments.packets.'.$packet->packetOption->name);

            return collect([
                'name' => trans(
                    'investments.finances_history_entries.packet_'.$transaction->type,
                    ['name' => $packetName]),
                'created_at' => $transaction->created_at,
                'amount' => $transaction->amount,
                'is_negative' => $transaction->type === PacketTransaction::TYPE_INVEST,
            ]);
        });
        $userBonuses->transform(function ($transaction) {
            return collect([
                'name' => trans('investments.finances_history_entries.user_'.$transaction->type),
                'created_at' => $transaction->created_at,
                'amount' => $transaction->amount,
                'is_negative' => false,
            ]);
        });
        $closedPackets = $packets
            ->filter(fn($packet) => $packet->trashed())
            ->map(function ($packet) {
                return collect([
                    'name' => trans('investments.finances_history_entries.packet_closed',
                        ['name' => trans('investments.packets.'.$packet->packetOption->name)]),
                    'created_at' => $packet->deleted_at,
                    'amount' => null,
                    'is_negative' => false,
                ]);
            });

        return collect()
            ->merge($packetsTransactions)
            ->merge($userBonuses)
            ->merge($closedPackets)
            ->sortByDesc('created_at')
            ->values();
    }
}
