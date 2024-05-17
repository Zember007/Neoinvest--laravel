<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CloseInvestment extends FormRequest
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
            'packet_id' => ['required', 'exists:packets,id'],
        ];
    }

    public function withValidator($validator)
    {
        $this->user()->forgetCachedBalance();

        $validator->after(function ($validator) {
            if ($this->user()->packets()->whereKey($this->packet_id)->doesntExist()) {
                $validator->errors()->add('packet_id', trans('validation.generic_error'));
            }
        });
    }
}
