<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PacketTransaction extends Model
{
    use HasFactory;

    const TYPE_INVEST = 'invest';
    const TYPE_INCOME = 'income';
    const TYPE_REFUND = 'refund';

    protected $guarded = [];

    public function scopeInvest($query)
    {
        return $query->where('type', PacketTransaction::TYPE_INVEST);
    }

    public function scopeIncome($query)
    {
        return $query->where('type', PacketTransaction::TYPE_INCOME);
    }

    public function scopeRefund($query)
    {
        return $query->where('type', PacketTransaction::TYPE_REFUND);
    }

    public function getIsInvestAttribute(): bool
    {
        return $this->type === PacketTransaction::TYPE_INVEST;
    }

    public function getIsIncomeAttribute(): bool
    {
        return $this->type === PacketTransaction::TYPE_INCOME;
    }

    public function getIsRefundAttribute(): bool
    {
        return $this->type === PacketTransaction::TYPE_REFUND;
    }

    public function packet(): BelongsTo
    {
        return $this->belongsTo(Packet::class);
    }
}
