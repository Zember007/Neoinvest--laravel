<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Transaction extends Model
{
    use HasFactory;

    const TYPE_REPLENISH = 'replenish';
    const TYPE_WITHDRAW = 'withdraw';
    const TYPE_WITHDRAW_FEE = 'withdraw_fee';
    const TYPE_TRANSFER = 'transfer';
    const TYPE_ADMIN = 'admin';
    const TYPE_STAR_BONUS = 'star_bonus';
    const TYPE_MONTHLY_TURNOVER_BONUS = 'monthly_turnover_bonus';

    protected $guarded = [];

    protected $casts = [
        'payload' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithoutCreated($query)
    {
        return $query->where('status', '!=', 'created');
    }

    public function scopePendingOrSuccessful($query)
    {
        return $query->whereIn('status', ['pending', 'success']);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeSuccessful($query)
    {
        return $query->where('status', 'success');
    }

    public function scopeReplenishes($query)
    {
        return $query->where('type', Transaction::TYPE_REPLENISH);
    }

    public function scopeAdmin($query)
    {
        return $query->where('type', Transaction::TYPE_ADMIN);
    }

    public function scopeStarBonus($query)
    {
        return $query->where('type', Transaction::TYPE_STAR_BONUS);
    }

    public function scopeMonthlyTurnoverBonus($query)
    {
        return $query->where('type', Transaction::TYPE_MONTHLY_TURNOVER_BONUS);
    }

    public function scopeSent($query)
    {
        return $query->whereNotNull('payload->receiver_id');
    }

    public function scopeReceived($query)
    {
        return $query->whereNotNull('payload->sender_id');
    }

    public function scopeWithdraws($query)
    {
        return $query->where('type', Transaction::TYPE_WITHDRAW);
    }

    public function scopeWithdrawsFees($query)
    {
        return $query->where('type', Transaction::TYPE_WITHDRAW_FEE);
    }

    public function scopeTransfers($query)
    {
        return $query->where('type', Transaction::TYPE_TRANSFER);
    }

    public function scopeCreatedWithinRange($query, $range)
    {
        [$start, $end] = explode(" - ", $range);

        return $query
            ->where('created_at', '>=', Carbon::parse($start))
            ->where('created_at', '<=', Carbon::parse($end));
    }

    public function scopeLastDay($query)
    {
        return $query->whereDate('updated_at', '>', now()->subDay());
    }
}
