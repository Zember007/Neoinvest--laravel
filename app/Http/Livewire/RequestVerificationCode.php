<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RequestVerificationCode extends Component
{
    public int $cooldown = 0;

    public function mount()
    {
        $this->cooldown = $this->getUserProperty()->getVerificationCooldown();
    }

    public function getUserProperty()
    {
        return auth()->user();
    }

    public function requestCode()
    {
        $this->getUserProperty()->sendVerificationNotification(true);
        $this->cooldown = $this->getUserProperty()->getVerificationCooldown();
        $this->dispatchBrowserEvent('cooldown-updated');
    }

    public function render()
    {
        return view('livewire.request-verification-code');
    }
}
