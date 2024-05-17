<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Packet;
use App\Models\PacketOption;
use Illuminate\Support\Facades\Gate;

class ClosingPacketsController extends Controller
{
    public function index()
    {
        Gate::authorize('admin_view_closing_packets');

        $packets = Packet::query()
            ->closing()
            ->withSum([
                'transactions' => function ($query) {
                    $query->invest();
                }
            ], 'amount')
            ->paginate(20);
        $packetsTotal = Packet::closing()->count();
        $packetOptions = PacketOption::all();

        return view('admin.closing-packets.index', compact('packets', 'packetsTotal', 'packetOptions'));
    }
}
