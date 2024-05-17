<?php

namespace App\Actions;

use App\Models\Star;
use App\Models\Transaction;
use App\Models\User;

class ApplyMonthlyTurnoverBonus
{
    public function __invoke()
    {
        $stars = Star::query()
            ->where('monthly_turnover_bonus_percentage', '>', 0)
            ->get();
        $directors = User::query()
            ->whereIn('star_id', $stars->pluck('id'))
            ->where('is_banned', false)
            ->get();

        foreach ($directors as $director) {
            $director->transactions()->create([
                'type' => Transaction::TYPE_MONTHLY_TURNOVER_BONUS,
                'amount' => $director->getReferralsPacketInvests() * ($director->star->monthly_turnover_bonus_percentage / 100),
                'status' => 'success',
            ]);

            $director->forgetCachedBalance();
        }
    }
}