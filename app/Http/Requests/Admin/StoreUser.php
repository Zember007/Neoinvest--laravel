<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string'],
            'login' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user->id),
                Rule::unique('users', 'phone')->ignore($this->user->id),
            ],
            'is_verified' => ['required', 'boolean'],
            'role' => ['required', 'string'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_verified' => $this->is_verified === 'on',
        ]);
    }
}
