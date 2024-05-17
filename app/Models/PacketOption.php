<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacketOption extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 2;
    const STATUS_HIDDEN = 3;

    protected $guarded = [];

    protected $appends = [
        'is_reinvestable',
        'is_indefinite',
    ];

    public function getIsReinvestableAttribute()
    {
        return ! is_null($this->min_reinvest) && $this->min_reinvest > 0;
    }

    public function getIsIndefiniteAttribute()
    {
        return is_null($this->duration_days);
    }

    public function getIsActiveAttribute()
    {
        return $this->status === PacketOption::STATUS_ACTIVE;
    }

    public function getIsDisabledAttribute()
    {
        return $this->status === PacketOption::STATUS_DISABLED;
    }

    public function getIsHiddenAttribute()
    {
        return $this->status === PacketOption::STATUS_HIDDEN;
    }
}
