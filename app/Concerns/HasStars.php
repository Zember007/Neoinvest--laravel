<?php

namespace App\Concerns;

use App\Events\PromotedStar;
use App\Models\Star;
use App\Models\StarTransaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasStars
{
    protected static function booted()
    {
        static::created(function (User $user) {
            $user->star()->associate(Star::where('level', 0)->first())->save();
        });
    }

    public function star(): BelongsTo
    {
        return $this->belongsTo(Star::class);
    }

    public function getReferralBonusesAttribute()
    {
        return $this->starTransactions()->sum('amount');
    }

    public function starTransactions(): HasMany
    {
        return $this->hasMany(StarTransaction::class);
    }

    public function promoteStar()
    {
        $nextStar = $this->getNextStar();
        if (! is_null($nextStar)) {
            $this->star()->associate($nextStar)->save();
            event(new PromotedStar($this));
        }
    }

    public function getNextStar()
    {
        return Star::where('level', $this->star->level + 1)->first();
    }

    public function getStarProgressPercentage()
    {
        if (is_null($this->getNextStar())) {
            return 100;
        }

        $x = $this->getReferralsPacketInvests();
        $a = $this->star->min_turnover;
        $b = $this->getNextStar()->min_turnover;

        return (($x - $a) / ($b - $a)) * 100;
    }
}
