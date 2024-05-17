<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\PacketOption;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

class LogsController extends Controller
{
    public function index()
    {
        Gate::authorize('admin_view_logs');

        $logs = Log::query()
            ->with('user')
            ->whereJsonContains('payload->is_admin', true)
            ->latest()
            ->when(request('user'),
                fn($query, $name) => $query->whereHas('user', fn($query1) => $query1->fullName($name)))
            ->when(
                request('action') && request('action') !== 'null',
                fn($query, $action) => $query->where('action', (int) request('action')))
            ->paginate(5);
        $packets = PacketOption::all();
        $userIds = collect(Arr::pluck($logs->items(), 'payload.user_id'))
            ->filter(fn($id) => ! is_null($id))
            ->values();
        $users = User::whereIn('id', $userIds)->get();

        return view('admin.logs.index', compact('logs', 'packets', 'users'));
    }

    public function search(Request $request): RedirectResponse
    {
        return redirect()->route('admin.logs.index', $request->except('_token'));
    }
}
