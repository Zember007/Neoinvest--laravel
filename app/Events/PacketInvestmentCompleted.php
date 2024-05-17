<?php

namespace App\Events;

use App\Models\PacketTransaction;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PacketInvestmentCompleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;

    public PacketTransaction $transaction;

    public function __construct(User $user, PacketTransaction $transaction)
    {
        $this->user = $user;
        $this->transaction = $transaction;
    }
}
