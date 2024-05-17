<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePacketOption;
use App\Models\PacketOption;
use App\Services\Admin\PacketService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class PacketController extends Controller
{
    private PacketService $packetService;

    public function __construct(PacketService $packetService)
    {
        $this->packetService = $packetService;
    }

    public function index()
    {
        Gate::authorize('admin_view_packets');

        $packets = PacketOption::all();

        return view('admin.packets.index', compact('packets'));
    }

    public function edit(PacketOption $packet)
    {
        Gate::authorize('admin_edit_packet');

        return view('admin.packets.edit', compact('packet'));
    }

    public function update(StorePacketOption $request, PacketOption $packet): RedirectResponse
    {
        Gate::authorize('admin_edit_packet');

        $this->packetService->update($packet, $request->all());

        return back();
    }
}
