<?php

namespace App\Concerns;

use App\Notifications\VerifyEmail;
use App\Notifications\VerifyPhone;
use Illuminate\Support\Facades\Cache;

trait HasVerification
{
    public function sendVerificationNotification(bool $resend = false, bool $passwordReset = false)
    {
        if ($this->getVerificationCooldown() > 0) {
            return;
        }

        $this->hasEmailFilled()
            ? $this->notify(new VerifyEmail($resend, $passwordReset))
            : $this->notify(new VerifyPhone($resend, $passwordReset));

        Cache::put($this->getVerificationCooldownKey(), now()->addMinute());
    }

    public function getVerificationCooldown()
    {
        $cd = Cache::get($this->getVerificationCooldownKey());
        $diff = now()->diffInSeconds($cd, false);

        return $diff < 0 ? 0 : $diff;
    }

    public function getVerificationCooldownKey(): string
    {
        return "user:$this->id:verification_cooldown";
    }

    public function isVerificationCodeValid(int $code): bool
    {
        return (int) Cache::get($this->getVerificationCodeKey()) === $code;
    }

    public function getVerificationCodeKey(): string
    {
        return "user:$this->id:verification_code";
    }
}