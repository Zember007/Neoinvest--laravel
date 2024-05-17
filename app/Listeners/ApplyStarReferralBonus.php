<?php

namespace App\Listeners;

use App\Events\PacketInvestmentCompleted;
use App\Models\Referral;

class ApplyStarReferralBonus
{
    public function handle(PacketInvestmentCompleted $event)
    {
        $user = $event->user;
        $transaction = $event->transaction;
        $referrals = Referral::where('referred_id', $user->id)->with('referrer.star')->get();

        foreach ($referrals as $referral) {
            if ($referral->referrer->packets()->count() === 0) {
                continue;
            }

            $percentages = $referral->referrer->star->referral_bonus_percentage;
            if ($percentages->get($referral->level) > 0) {
                $amount = $transaction->amount * ($percentages->get($referral->level) / 100);
                $referral->referrer->starTransactions()->create([
                    'amount' => $amount,
                    'referral_id' => $referral->id,
                    'referred_id' => $user->id,
                ]);

                $referral->referrer->forgetCachedBalance();
            }
        }
    }
}
