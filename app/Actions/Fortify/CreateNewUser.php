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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', Rule::in(array_keys(config('countries')))],
            'is_email' => ['required', 'string', 'in:true,false'],
            'login' => ['required', 'string', 'max:255', 'unique:users,email', 'unique:users,phone'],
            'referrer_id' => ['nullable', 'integer', 'exists:users,id'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'country' => $input['country'],
            'email' => $input['is_email'] === 'true' ? $input['login'] : null,
            'phone' => $input['is_email'] === 'false' ? $input['login'] : null,
            'locale' => app()->getLocale(),
            'referrer_id' => $input['referrer_id'],
            'password' => Hash::make($input['password']),
            'register_ip_address' => ip(),
        ]);
    }
}
