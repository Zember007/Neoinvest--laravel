<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFinance extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => [
                'required', 'string',
                Rule::in([Transaction::TYPE_REPLENISH, Transaction::TYPE_WITHDRAW, Transaction::TYPE_TRANSFER]),
            ],
            'method' => [
                'required_if:type,'.Transaction::TYPE_REPLENISH,
                'string',
                Rule::in(array_keys(config('finances.supported'))),
            ],
            'amount' => ['required', 'numeric', 'gt:0', 'lt:999999'],
            'withdraw_to' => ['required_if:type,withdraw', 'string'],
            'receiver_id' => ['required_if:type,transfer', 'integer'],
        ];
    }

    public function withValidator($validator)
    {
        $this->user()->forgetCachedBalance();

        $validator->after(function ($validator) {
            if ($this->type === Transaction::TYPE_WITHDRAW && $this->amount < 50) {
                $validator->errors()->add('amount',
                    trans('validation.min.numeric', ['attribute' => 'amount', 'min' => 50]));
            }
            if ($this->type === Transaction::TYPE_WITHDRAW || $this->type === Transaction::TYPE_TRANSFER) {
                if ($this->amount > $this->user()->balance) {
                    $validator->errors()->add('amount', trans('validation.greater_than_balance'));
                }
            }
            if ($this->type === Transaction::TYPE_TRANSFER && (int) $this->receiver_id === $this->user()->id) {
                $validator->errors()->add('receiver_id', trans('validation.generic_error'));
            }
        });
    }
}
