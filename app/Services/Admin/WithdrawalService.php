<?php

namespace App\Services\Admin;

use App\Models\Log;
use App\Models\Transaction;
use App\Services\LoggerService;

class WithdrawalService
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function allow(Transaction $transaction)
    {
        $transaction->update([
            'status' => 'success',
        ]);
        $transaction->user->forgetCachedBalance();

        $this->loggerService->logAdmin(Log::ADMIN_ALLOW_WITHDRAWAL, [
            'transaction_id' => $transaction->id,
        ]);
    }

    public function deny(Transaction $transaction)
    {
        $transaction->update([
            'status' => 'failed',
        ]);
        Transaction::query()
            ->withdrawsFees()
            ->whereJsonContains('payload->transaction_id', $transaction->id)
            ->first()
            ->update([
                'status' => 'failed',
            ]);
        $transaction->user->forgetCachedBalance();

        $this->loggerService->logAdmin(Log::ADMIN_DENY_WITHDRAWAL, [
            'transaction_id' => $transaction->id,
        ]);
    }
}
