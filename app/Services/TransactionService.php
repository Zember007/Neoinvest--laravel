<?php

namespace App\Services;

use App\Models\Log;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

class TransactionService
{
    private PayKassaService $merchant;
    private LoggerService $loggerService;

    public function __construct(PayKassaService $merchant, LoggerService $loggerService)
    {
        $this->merchant = $merchant;
        $this->loggerService = $loggerService;
    }

    public function create(User $user, array $data): RedirectResponse
    {
        if ($data['type'] === Transaction::TYPE_REPLENISH) {
            return $this->createReplenishment($user, $data);
        } elseif ($data['type'] === Transaction::TYPE_WITHDRAW) {
            return $this->createWithdrawal($user, $data);
        } elseif ($data['type'] === Transaction::TYPE_TRANSFER) {
            return $this->createTransfer($user, $data);
        }

        return back();
    }

    private function createReplenishment(User $user, array $data): RedirectResponse
    {
        $transaction = $user->transactions()->create([
            'type' => Transaction::TYPE_REPLENISH,
            'amount' => Arr::get($data, 'amount'),
        ]);

        return redirect()->away($this->merchant->createChargeUrl($transaction, $data['method']));
    }

    private function createWithdrawal(User $user, array $data): RedirectResponse
    {
        $fee = Arr::get($data, 'amount') * ($user->withdrawal_fee / 100);
        $oldBalance = $user->balance;
        $transaction = $user->transactions()->create([
            'type' => Transaction::TYPE_WITHDRAW,
            'amount' => Arr::get($data, 'amount') - $fee,
            'payload' => ['withdraw_to' => Arr::get($data, 'withdraw_to')],
            'status' => 'pending',
        ]);
        $user->transactions()->create([
            'type' => Transaction::TYPE_WITHDRAW_FEE,
            'payload' => ['transaction_id' => $transaction->id],
            'amount' => $fee,
            'status' => 'success',
        ]);

        $user->forgetCachedBalance();
        $newBalance = $user->balance;

        $this->loggerService->log(Log::WITHDRAW, $user, [
            'old_balance' => $oldBalance,
            'new_balance' => $newBalance,
            'transaction_id' => $transaction->id,
        ]);

        session()->flash('success', trans('finances.withdrawal_created'));

        return back();
    }

    private function createTransfer(User $user, array $data): RedirectResponse
    {
        $receiver = User::find(Arr::get($data, 'receiver_id'));
        $oldBalanceSender = $user->balance;
        $oldBalanceReceiver = $receiver->balance;
        $senderTransaction = $user->transactions()->create([
            'type' => Arr::get($data, 'type'),
            'amount' => Arr::get($data, 'amount'),
            'payload' => [
                'receiver_id' => Arr::get($data, 'receiver_id'),
            ],
            'status' => 'success',
        ]);
        $receiverTransaction = $receiver->transactions()->create([
            'type' => Arr::get($data, 'type'),
            'amount' => Arr::get($data, 'amount'),
            'payload' => [
                'sender_id' => $user->id,
            ],
            'status' => 'success',
        ]);

        $user->forgetCachedBalance();
        $receiver->forgetCachedBalance();
        $newBalanceSender = $user->balance;
        $newBalanceReceiver = $receiver->balance;

        $this->loggerService->log(Log::TRANSFER, $user, [
            'old_balance' => $oldBalanceSender,
            'new_balance' => $newBalanceSender,
            'transaction_id' => $senderTransaction->id,
        ]);
        $this->loggerService->log(Log::TRANSFER, $receiver, [
            'old_balance' => $oldBalanceReceiver,
            'new_balance' => $newBalanceReceiver,
            'transaction_id' => $receiverTransaction->id,
        ]);

        session()->flash('success', trans('finances.transferred_successfully'));

        return back();
    }
}
