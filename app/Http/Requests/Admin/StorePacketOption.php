<?php

namespace App\Http\Requests\Admin;

use App\Models\PacketOption;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePacketOption extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'percentage' => ['required', 'numeric', 'min:0'],
            'min_invest' => ['required', 'numeric', 'min:0'],
            'min_reinvest' => ['nullable', 'numeric', 'min:0'],
            'duration_days' => ['nullable', 'numeric', 'min:0'],
            'is_refundable' => ['required', 'boolean'],
            'status' => [
                'required',
                Rule::in(PacketOption::STATUS_ACTIVE, PacketOption::STATUS_DISABLED, PacketOption::STATUS_HIDDEN)
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'min_reinvest' => $this->min_reinvest === '0' ? null : $this->min_reinvest,
            'duration_days' => $this->duration_days === '0' ? null : $this->duration_days,
            'is_refundable' => $this->is_refundable === 'on',
        ]);
    }
}
