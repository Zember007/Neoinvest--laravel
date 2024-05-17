<?php

namespace App\Http\Controllers;

use App\Events\TransactionConfirmed;
use App\Models\Log;
use App\Models\Transaction;
use App\Services\LoggerService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProcessPayKassaCallback extends Controller
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function __invoke(Request $request): Response
    {
        $transaction = Transaction::whereKey(request('order_id'))->firstOrFail();

        $oldBalance = $transaction->user->balance;
        $transaction->update([
            'merchant_id' => request('private_hash'),
            'status' => 'success',
        ]);

        $transaction->user->forgetCachedBalance();
        $newBalance = $transaction->user->balance;

        $this->loggerService->log(Log::REPLENISH, $transaction->user, [
            'old_balance' => $oldBalance,
            'new_balance' => $newBalance,
            'transaction_id' => $transaction->id,
        ]);

        event(new TransactionConfirmed($transaction));

        return response("$transaction->id|success");
    }
}
