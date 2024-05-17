<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;

class Referrals extends Component
{
    const RECORDS_PER_PAGE = 20;

    public $user;

    public $referrals;

    public $perPage = Logs::RECORDS_PER_PAGE;

    public function mount()
    {
        $this->referrals = collect();
    }

    public function loadMore()
    {
        $this->perPage += Referrals::RECORDS_PER_PAGE;
    }

    public function render()
    {
        $this->referrals = $this->user
            ->referrals()
            ->with('referred.star')
            ->take($this->perPage)
            ->get();

        return view('livewire.admin.user.referrals');
    }
}
