<?php

namespace App\Concerns;

trait HasMetrics
{
    public function getPartnersDaily()
    {
        return $this->referrals()->whereDate('created_at', '>', now()->subDay())->count();
    }

    public function getPartnersMonthly()
    {
        return $this->referrals()->whereDate('created_at', '>', now()->subMonth())->count();
    }

    public function getInvestmentsMonthly()
    {
        return $this->packetsTransactions()->invest()->whereDate('packet_transactions.created_at', '>',
            now()->subMonth())->sum('amount');
    }

    public function getReferralBonusesMonthly()
    {
        return $this->starTransactions()->whereDate('created_at', '>', now()->subMonth())->sum('amount');
    }
}
