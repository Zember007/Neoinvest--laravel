<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreStar extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'min_turnover' => ['nullable', 'numeric', 'min:0'],
            'min_turnover_fl' => ['nullable', 'numeric', 'min:0'],
            'bonus' => ['nullable', 'numeric', 'min:0'],
            'monthly_turnover_bonus_percentage' => ['nullable', 'numeric', 'min:0'],
            'referral_bonus_percentage' => ['required', 'array'],
            'referral_bonus_percentage.*' => ['required', 'numeric', 'min:0'],
        ];
    }
}
