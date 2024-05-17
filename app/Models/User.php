<?php

namespace App\Models;

use App\Concerns\HasFinances;
use App\Concerns\HasMetrics;
use App\Concerns\HasStars;
use App\Concerns\HasVerification;
use App\Concerns\MustVerifyEmailOrPhone;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasLocalePreference
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use MustVerifyEmailOrPhone;
    use HasVerification;
    use HasMetrics;
    use HasStars;
    use HasFinances;
    use HasRoles;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    public function hasPhoneFilled(): bool
    {
        return !is_null($this->phone);
    }

    public function hasEmailFilled(): bool
    {
        return !is_null($this->email);
    }

    public function getContactsAttribute()
    {
        if (!is_null($this->secondary_phone)) {
            return $this->secondary_phone;
        }

        if ($this->hasEmailFilled()) {
            return null;
        }

        return $this->phone;
    }

    public function getLoginAttribute()
    {
        return $this->hasEmailFilled() ? $this->email : $this->phone;
    }

    public function getIs2FAEnabledAttribute(): bool
    {
        return !empty($this->two_factor_secret);
    }

    public function packets(): HasMany
    {
        return $this->hasMany(Packet::class);
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(Referral::class, 'referrer_id');
    }

    public function referralOf(): HasMany
    {
        return $this->hasMany(Referral::class, 'referred_id');
    }

    public function referrer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }

    public function scopeFullName($query, $name)
    {
        return $query->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'LIKE', "%$name%");
    }

    public function scopeRegisteredLastDay($query)
    {
        return $query->whereDate('created_at', '>', now()->subDay());
    }

    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF&size=256&rounded=true&name='.$this->getFullNameAttribute();
    }

    public function getFullNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

    public function getFullNameShortAttribute()
    {
        $firstLastNameLetter = mb_substr($this->last_name, 0, 1);

        return "$this->first_name $firstLastNameLetter.";
    }

    public function preferredLocale()
    {
        return Cookie::get('locale') ?? $this->locale;
    }
}
