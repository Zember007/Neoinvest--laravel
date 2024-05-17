<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class PartnerService
{
    public function getHistory(User $user): Collection
    {
        $starTransactions = $user
            ->starTransactions()
            ->with('referred', 'referral')
            ->get()
            ->map(function ($transaction) {
                return collect([
                    'is_star_transaction' => true,
                    'referred_name' => $transaction->referred->full_name,
                    'referral_level' => $transaction->referral->level,
                    'amount' => $transaction->amount,
                    'created_at' => $transaction->created_at,
                ]);
            });
        $starBonuses = $user
            ->transactions()
            ->starBonus()
            ->get()
            ->map(function ($transaction) {
                return collect([
                    'is_star_bonus' => true,
                    'level' => Arr::get($transaction->payload, 'level'),
                    'amount' => $transaction->amount,
                    'created_at' => $transaction->created_at,
                ]);
            });

        return collect()
            ->merge($starTransactions)
            ->merge($starBonuses)
            ->sortByDesc('created_at')
            ->values();
    }
}
