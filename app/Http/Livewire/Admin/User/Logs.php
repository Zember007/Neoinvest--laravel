<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\PacketOption;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

class Logs extends Component
{
    const RECORDS_PER_PAGE = 5;

    public $user;

    public $logs;

    public $packetOptions;

    public $transactions;

    public $transferUsers;

    public $admins;

    public $perPage = Logs::RECORDS_PER_PAGE;

    public function loadMore()
    {
        $this->perPage += Logs::RECORDS_PER_PAGE;
    }

    public function render()
    {
        $this->logs = $this->user
            ->logs()
            ->take($this->perPage)
            ->latest()
            ->get();
        $packetOptionsIds = $this->logs
            ->pluck('payload.packet_option_id')
            ->filter(fn($id) => ! is_null($id));
        $transactionsIds = $this->logs
            ->pluck('payload.transaction_id')
            ->filter(fn($id) => ! is_null($id));
        $this->packetOptions = PacketOption::query()
            ->whereIn('id', $packetOptionsIds)
            ->get();
        $this->transactions = Transaction::query()
            ->whereIn('id', $transactionsIds)
            ->get();
        $transfers = $this->user->transactions()
            ->transfers()
            ->whereIn('id', $transactionsIds)
            ->successful()
            ->get();
        $transferUserIds = $transfers->pluck('payload.receiver_id')
            ->merge($transfers->pluck('payload.sender_id'))
            ->filter(fn($id) => ! is_null($id))
            ->unique()
            ->values()
            ->all();
        $this->transferUsers = User::query()
            ->whereIn('id', $transferUserIds)
            ->get();
        $adminIds = $this->logs
            ->pluck('payload.admin_id')
            ->filter(fn($id) => ! is_null($id))
            ->values();
        $this->admins = User::query()
            ->whereIn('id', $adminIds)
            ->get();

        return view('livewire.admin.user.logs');
    }
}
