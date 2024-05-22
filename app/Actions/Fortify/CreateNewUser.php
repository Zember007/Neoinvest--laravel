<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        Validator::make($input, [ 
            'login' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
            'referrer_id' => ['nullable', 'integer', 'exists:users,id'],
        ])->validate();

        return User::create([
            'login' => $input['login'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'referrer_id' => $input['referrer_id']?$input['referrer_id']:null, 
            'register_ip_address' => ip(),
        ]);
    }
}
