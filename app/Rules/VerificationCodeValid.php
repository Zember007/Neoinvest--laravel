<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class VerificationCodeValid implements Rule
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function passes($attribute, $value): bool
    {
        return $this->user->isVerificationCodeValid((int) $value);
    }

    public function message(): string
    {
        return trans('auth.verification_code_invalid');
    }
}
