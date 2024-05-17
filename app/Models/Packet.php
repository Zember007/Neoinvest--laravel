<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Packet extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_refundable' => 'bool',
    ];

    public function getInvestedAttribute()
    {
        return $this->transactions()->invest()->sum('amount');
    }

    public function getEarnedAttribute()
    {
        return $this->transactions()->income()->sum('amount');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(PacketTransaction::class);
    }

    public function packetOption(): BelongsTo
    {
        return $this->belongsTo(PacketOption::class);
    }

    public function scopeClosing($query, $closed = false)
    {
        return $query
            ->withTrashed()
            ->where('deleted_at', $closed ? '<=' : '>', now()->subMonth())
            ->whereNull('refunded_at')
            ->whereHas('packetOption', function ($query) {
                $query->where('is_refundable', true);
            });
    }
}
