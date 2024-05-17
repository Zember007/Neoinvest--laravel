<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilePictureForm extends Component
{
    use WithFileUploads;

    public $photo;

    protected $listeners = ['upload:finished' => 'updatePhoto'];

    public function updatePhoto()
    {
        $this->resetErrorBag();

        $this->validate([
            'photo' => ['mimes:jpg,jpeg,png', 'max:10240'],
        ]);

        $this->getUserProperty()->updateProfilePhoto($this->photo);

        $this->emit('refresh-sidebar');
    }

    public function getUserProperty()
    {
        return auth()->user();
    }

    public function deletePhoto()
    {
        $this->getUserProperty()->deleteProfilePhoto();

        $this->emit('refresh-sidebar');
    }

    public function render()
    {
        return view('livewire.profile-picture-form');
    }
}
