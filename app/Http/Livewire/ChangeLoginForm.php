<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangeLoginForm extends Component
{
    public $mode;

    public $login;

    public function update()
    {
        $this->resetErrorBag();

        $this->validate([
            'login' => ['required', 'string', 'max:255', 'unique:users,email', 'unique:users,phone'],
        ]);

        $this->getUserProperty()->hasEmailFilled()
            ? $this->getUserProperty()->update(['email' => $this->login])
            : $this->getUserProperty()->update(['phone' => $this->login]);

        $this->getUserProperty()->sendVerificationNotification();

        return redirect()->route('verify.index');
    }

    public function getUserProperty()
    {
        return auth()->user();
    }

    public function render()
    {
        return view('livewire.change-login-form');
    }
}
