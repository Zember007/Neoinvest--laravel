<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SidebarProfilePicture extends Component
{
    protected $listeners = ['refresh-sidebar' => '$refresh'];

    public function getUserProperty()
    {
        return auth()->user();
    }

    public function render()
    {
        return view('livewire.sidebar-profile-picture');
    }
}
