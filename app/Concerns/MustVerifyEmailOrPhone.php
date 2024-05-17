<?php

namespace App\Concerns;

trait MustVerifyEmailOrPhone
{
    public function isVerified(): bool
    {
        return $this->hasVerifiedEmail() || $this->hasVerifiedPhone();
    }

    public function hasVerifiedEmail(): bool
    {
        return ! is_null($this->email_verified_at);
    }

    public function hasVerifiedPhone(): bool
    {
        return ! is_null($this->phone_verified_at);
    }

    public function markAsVerified(): bool
    {
        $fieldToUpdate = $this->hasEmailFilled() ? 'email_verified_at' : 'phone_verified_at';

        return $this->forceFill([$fieldToUpdate => $this->freshTimestamp()])->save();
    }

    public function markAsUnverified(): bool
    {
        $fieldToUpdate = $this->hasEmailFilled() ? 'email_verified_at' : 'phone_verified_at';

        return $this->forceFill([$fieldToUpdate => null])->save();
    }
}