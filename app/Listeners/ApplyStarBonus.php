<?php

namespace App\Listeners;

use App\Events\PromotedStar;
use App\Models\Transaction;

class ApplyStarBonus
{
    public function handle(PromotedStar $event)
    {
        $user = $event->user;
        if ($user->packets()->count() === 0) {
            return;
        }

        $user->transactions()->create([
            'type' => Transaction::TYPE_STAR_BONUS,
            'amount' => $user->star->bonus,
            'status' => 'success',
            'payload' => [
                'level' => $user->star->level,
            ],
        ]);

        $user->forgetCachedBalance();
    }
}
