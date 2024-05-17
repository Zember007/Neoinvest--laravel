<?php

namespace App\Actions;

use App\Models\Log;
use App\Models\PacketTransaction;
use App\Models\User;
use App\Services\LoggerService;
use Carbon\Carbon;

class ApplyIncome
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function __invoke()
    {
        $tz = 'Europe/Moscow';
        $left = Carbon::createFromFormat('d-m-Y', '01-01-2022', $tz);
        $right = Carbon::createFromFormat('d-m-Y', '12-01-2022', $tz);
        if (now()->setTimezone($tz)->between($left, $right)) {
            return;
        }

        $users = User::query()
            ->with('packets', function ($query) {
                $query->withSum([
                    'transactions' => function ($query) {
                        $query->invest();
                    }
                ], 'amount');
            })
            ->where('is_banned', false)
            ->get();

        foreach ($users as $user) {
            foreach ($user->packets as $packet) {
                $amount = $packet->transactions_sum_amount / 100 * $packet->percentage;
                $oldBalance = $user->balance;
                $packet->transactions()->create([
                    'type' => PacketTransaction::TYPE_INCOME,
                    'amount' => $amount,
                ]);

                $user->forgetCachedBalance();
                $newBalance = $user->balance;

                $this->loggerService->log(Log::INCOME, $user, [
                    'old_balance' => $oldBalance,
                    'new_balance' => $newBalance,
                    'sum' => $amount,
                    'packet_option_id' => $packet->packetOption->id,
                ]);
            }
        }
    }
}