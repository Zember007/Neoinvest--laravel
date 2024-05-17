<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FinanceTransferForm extends Component
{
    public array $state = [
        'receiver_id' => '',
        'amount' => '',
        'receiver' => null,
    ];

    public function render()
    {
        $this->state['receiver'] = User::query()
            ->where('id', '!=', auth()->user()->id)
            ->whereKey($this->state['receiver_id'])
            ->first();

        return view('livewire.finance-transfer-form');
    }
}
