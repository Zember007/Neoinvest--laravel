<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use HasFactory;

    const LOGIN = 1;
    const REGISTER = 2;
    const REPLENISH = 3;
    const WITHDRAW = 4;
    const TRANSFER = 5;
    const INCOME = 6;
    const PACKET_INVEST = 7;
    const PACKET_REINVEST = 8;
    const PACKET_CLOSE = 9;
    const ADMIN_CHANGE_BALANCE = 10;
    const ADMIN_BAN_USER = 11;
    const ADMIN_UNBAN_USER = 12;
    const ADMIN_UPDATE_PACKET = 13;
    const ADMIN_UPDATE_USER = 14;
    const ADMIN_UPDATE_STAR = 15;
    const ADMIN_ALLOW_WITHDRAWAL = 16;
    const ADMIN_DENY_WITHDRAWAL = 17;
    const ADMIN_DEBUG_REPLENISH = 18;

    protected $guarded = [];

    protected $casts = [
        'payload' => 'collection',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getActionNameAttribute()
    {
        switch ($this->action) {
            case Log::LOGIN:
                return trans('auth.sign_in');
            case Log::REGISTER:
                return trans('auth.sign_up');
            case Log::REPLENISH:
                return trans('finances.replenish');
            case Log::WITHDRAW:
                return trans('finances.withdraw');
            case Log::TRANSFER:
                return trans('finances.transfer');
            case Log::INCOME:
                return trans('investments.dividendum');
            case Log::PACKET_INVEST:
                return trans('investments.investment');
            case Log::PACKET_REINVEST:
                return trans('investments.reinvestment');
            case Log::PACKET_CLOSE:
                return trans('investments.closing_packet');
            case Log::ADMIN_CHANGE_BALANCE:
                return trans('users.manual_change_balance');
            case Log::ADMIN_BAN_USER:
                return trans('logs.ban_user');
            case Log::ADMIN_UNBAN_USER:
                return trans('logs.unban_user');
            case Log::ADMIN_UPDATE_PACKET:
                return trans('logs.update_packet');
            case Log::ADMIN_UPDATE_USER:
                return trans('logs.update_user');
            case Log::ADMIN_UPDATE_STAR:
                return trans('logs.update_star');
            case Log::ADMIN_ALLOW_WITHDRAWAL:
                return trans('logs.allow_withdrawal');
            case Log::ADMIN_DENY_WITHDRAWAL:
                return trans('logs.deny_withdrawal');
            case Log::ADMIN_DEBUG_REPLENISH:
                return trans('logs.debug_replenish');
            default:
                return '';
        }
    }
}
