<?php

namespace App\Listeners;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class CreateReferrals
{
    public function handle(Registered $event)
    {
        /** @var User $subject */
        $subject = $event->user;
        $this->createReferral($subject, $subject->referrer, 1);
    }

    public function createReferral(User $subject, ?User $partner, $level)
    {
        if (is_null($partner)) {
            return;
        }

        Referral::create([
            'referrer_id' => $partner->id,
            'referred_id' => $subject->id,
            'level' => $level++,
        ]);

        $this->createReferral($subject, $partner->referrer, $level > 9 ? 9 : $level);
    }
}
