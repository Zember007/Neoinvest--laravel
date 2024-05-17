<?php

namespace App\Listeners;

use App\Events\PacketInvestmentCompleted;
use App\Models\User;

class PromoteStar
{
    public function handle(PacketInvestmentCompleted $event)
    {
        $referrers = $event->user
            ->referralOf()
            ->with('referrer')
            ->get()
            ->pluck('referrer');

        foreach ($referrers as $user) {
            $this->promote($user);
        }
    }

    private function promote(User $user)
    {
        $nextStar = $user->getNextStar();
        if (is_null($nextStar)) {
            return;
        }

        if ($user->getReferralsPacketInvests() >= $nextStar->min_turnover) {
            if ($user->getReferralsPacketInvestsFL() >= $nextStar->min_turnover_fl) {
                $user->promoteStar();
                $this->promote($user);
            }
        }
    }
}
