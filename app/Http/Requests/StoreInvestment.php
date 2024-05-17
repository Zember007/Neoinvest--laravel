<?php

namespace App\Http\Requests;

use App\Models\PacketOption;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvestment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'packet_option_id' => ['required', 'exists:packet_options,id'],
            'packet_id' => ['sometimes', 'required', 'exists:packets,id'],
            'amount' => ['required', 'integer'],
        ];
    }

    public function withValidator($validator)
    {
        $this->user()->forgetCachedBalance();

        $validator->after(function ($validator) {
            $packetOption = PacketOption::find($this->packet_option_id);
            $isReinvesting = ! is_null($this->packet_id);
            $minAmount = $isReinvesting ? $packetOption->min_reinvest : $packetOption->min_invest;

            if (! $packetOption->isActive) {
                $validator->errors()->add('packet_id', trans('validation.generic_error'));
            }
            if ($this->user()->balance < $minAmount || $this->user()->balance < $this->amount) {
                $validator->errors()->add('amount', trans('validation.generic_error'));
            }
            if ($isReinvesting && ! $packetOption->is_reinvestable) {
                $validator->errors()->add('packet_id', trans('validation.generic_error'));
            }
            if ($isReinvesting && $this->user()->packets()->whereKey($this->packet_id)->doesntExist()) {
                $validator->errors()->add('packet_id', trans('validation.generic_error'));
            }
        });
    }
}
