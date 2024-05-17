<?php

namespace App\Http\Livewire;

use App\Actions\Fortify\PasswordValidationRules;
use App\Rules\VerificationCodeValid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ChangePassword extends Component
{
    use PasswordValidationRules;

    public array $state = [
        'current_password' => '',
        'password' => '',
        'password_confirmation' => '',
        'code' => '',
    ];

    public function open()
    {
        $this->resetErrorBag();
    }

    public function changePassword()
    {
        $this->resetErrorBag();

        Validator::make($this->state, [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
            'code' => ['required', 'integer', new VerificationCodeValid($this->getUserProperty())],
        ])->after(function ($validator) {
            if (! Hash::check($this->state['current_password'], $this->getUserProperty()->password)) {
                $validator->errors()->add('current_password', trans('settings.current_password_mismatch'));
            }
        })->validateWithBag('changePassword');

        $this->getUserProperty()->forceFill([
            'password' => Hash::make($this->state['password']),
        ])->save();

        session()->flash('success', trans('auth.password_changed_successfully'));

        return redirect()->route('settings');
    }

    public function getUserProperty()
    {
        return auth()->user();
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
