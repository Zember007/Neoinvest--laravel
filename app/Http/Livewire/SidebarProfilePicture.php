<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class SidebarProfilePicture extends Component
{

    use WithFileUploads;  
 
   

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
