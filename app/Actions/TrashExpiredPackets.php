<?php

namespace App\Actions;

use App\Models\Packet;

class TrashExpiredPackets
{
    public function __invoke()
    {
        Packet::where('expires_at', '<=', now())->delete();
    }
}