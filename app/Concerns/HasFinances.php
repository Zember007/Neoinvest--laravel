<?php

namespace App\Concerns;

use App\Models\Packet;
use App\Models\PacketTransaction;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Cache;

trait HasFinances
{
    public function getDailyIncomeAttribute()
    {
        return $this->packets()
            ->select(['percentage'])
            ->withSum([
                'transactions' => function ($query) {
                    $query->invest();
                }
            ], 'amount')
            ->get()
            ->sum(function ($packet) {
                return $packet->transactions_sum_amount / 100 * $packet->percentage;
            });
    }

    public function getRPICacheKey(): string
    {
        return "user-$this->id-referrals-packet-invests";
    }

    public function getReferralsPacketInvests()
    {
        return $this->referrals()
            ->with('referred')
            ->get()
            ->sum('referred.packet_invests');
    }

    public function getReferralsPacketInvestsMonthly()
    {
        return $this->referrals()
            ->with('referred')
            ->get()
            ->sum('referred.packet_invests_monthly');
    }

    public function getReferralsPacketInvestsFLAttribute()
    {
        return Cache::remember($this->getRPIFLCacheKey(), now()->addMinutes(10), function () {
            return $this->getReferralsPacketInvestsFL();
        });
    }

    public function getRPIFLCacheKey(): string
    {
        return "user-$this->id-referrals-packet-invests-fl";
    }

    public function getReferralsPacketInvestsFL()
    {
        return $this->referrals()
            ->where('level', 1)
            ->with('referred')
            ->get()
            ->sum('referred.packet_invests');
    }

    public function getPacketInvestsAttribute()
    {
        return $this->packetsTransactions()->invest()->sum('amount');
    }

    public function getPacketInvestsMonthlyAttribute()
    {
        return $this->getInvestmentsMonthly();
    }

    public function packetsTransactions(): HasManyThrough
    {
        return $this->hasManyThrough(PacketTransaction::class, Packet::class)->withTrashedParents();
    }

    public function getPacketIncomesAttribute()
    {
        return $this->packetsTransactions()->income()->sum('amount');
    }

    public function getPacketRefundsAttribute()
    {
        return $this->packetsTransactions()->refund()->sum('amount');
    }

    public function getBalanceAttribute()
    {
        return Cache::remember($this->getBalanceCacheKey(), now()->addMinutes(10), function () {
            $replenishes = $this->transactions()->replenishes()->successful()->sum('amount');
            $withdraws = $this->transactions()->withdraws()->pendingOrSuccessful()->sum('amount');
            $withdrawsFees = $this->transactions()->withdrawsFees()->successful()->sum('amount');
            $admin = $this->transactions()->admin()->successful()->sum('amount');
            $starBonus = $this->transactions()->starBonus()->successful()->sum('amount');
            $monthlyTurnoverBonus = $this->transactions()->monthlyTurnoverBonus()->successful()->sum('amount');
            $transfersSent = $this->transactions()->transfers()->successful()->sent()->sum('amount');
            $transfersReceived = $this->transactions()->transfers()->successful()->received()->sum('amount');
            $referralBonuses = $this->referral_bonuses;
            $investments = $this->packet_invests;
            $income = $this->packet_incomes;
            $refund = $this->packet_refunds;

            $balance = $replenishes
                - $withdraws
                - $withdrawsFees
                + $admin
                + $starBonus
                + $monthlyTurnoverBonus
                - $transfersSent
                + $transfersReceived
                - $investments
                + $referralBonuses
                + $income
                - $refund;

            return max(0, $balance);
        });
    }

    public function getBalanceCacheKey(): string
    {
        return "user-$this->id-balance";
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function forgetCachedBalance()
    {
        Cache::forget($this->getBalanceCacheKey());
    }

    public function getWithdrawalFeeAttribute()
    {
        $withdrawals = $this->transactions()
            ->withdraws()
            ->pendingOrSuccessful()
            ->where('updated_at', '>=', now()->subDays(12))
            ->count();
        $fees = config('withdrawals.fees');

        switch ($withdrawals) {
            case 0:
            case 1:
                return $fees['default'];
            case 2:
                return $fees['twice'];
            case 3:
                return $fees['thrice'];
            default:
                return $fees['quadruple'];
        }
    }
}
