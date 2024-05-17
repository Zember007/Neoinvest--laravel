<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReplenishmentController extends Controller
{
    public function index()
    {
        Gate::authorize('admin_view_replenishments');

        $transactions = Transaction::query()
            ->replenishes()
            ->withoutCreated()
            ->with('user')
            ->latest()
            ->when(
                request('user'),
                fn($query1, $user) => $query1->whereHas('user', fn($query2) => $query2->fullName($user)))
            ->when(
                request('sum'),
                fn($query, $sum) => $query->where('amount', $sum))
            ->when(
                request('merchant_id'),
                fn($query, $uuid) => $query->where('merchant_id', $uuid))
            ->when(
                request('created_at'),
                fn($query, $range) => $query->createdWithinRange($range))
            ->paginate(20);

        return view('admin.replenishments.index', compact('transactions'));
    }

    public function search(Request $request): RedirectResponse
    {
        return redirect()->route('admin.replenishments.index', $request->except('_token'));
    }
}
