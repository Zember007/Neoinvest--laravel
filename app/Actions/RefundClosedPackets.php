<?php

namespace App\Actions;

use App\Models\Packet;
use App\Models\PacketTransaction;
use Illuminate\Support\Facades\DB;

class RefundClosedPackets
{
    public function __invoke()
    {
        $packets = Packet::query()
            ->closing(true)
            ->withSum([
                'transactions' => function ($query) {
                    $query->invest();
                }
            ], 'amount')
            ->get();

        foreach ($packets as $packet) {
            DB::transaction(function () use ($packet) {
                $packet->transactions()->create([
                    'type' => PacketTransaction::TYPE_REFUND,
                    'amount' => $packet->transactions_sum_amount,
                ]);
                $packet->update(['refunded_at' => now()]);
            });
        }
    }
}