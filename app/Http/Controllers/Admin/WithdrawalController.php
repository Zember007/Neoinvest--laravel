<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Services\Admin\WithdrawalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WithdrawalController extends Controller
{
    private WithdrawalService $withdrawalService;

    public function __construct(WithdrawalService $withdrawalService)
    {
        $this->withdrawalService = $withdrawalService;
    }

    public function index()
    {
        Gate::authorize('admin_view_withdrawals');

        $transactions = Transaction::query()
            ->withdraws()
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
                request('destination'),
                fn($query, $destination) => $query->whereJsonContains('payload->withdraw_to', $destination))
            ->when(
                request('created_at'),
                fn($query, $range) => $query->createdWithinRange($range))
            ->paginate(20);

        return view('admin.withdrawals.index', compact('transactions'));
    }

    public function search(Request $request): RedirectResponse
    {
        return redirect()->route('admin.withdrawals.index', $request->except('_token'));
    }

    public function allow(Transaction $transaction): RedirectResponse
    {
        Gate::authorize('admin_allow_withdraw');

        $this->withdrawalService->allow($transaction);

        return back();
    }

    public function deny(Transaction $transaction): RedirectResponse
    {
        Gate::authorize('admin_deny_withdraw');

        $this->withdrawalService->deny($transaction);

        return back();
    }
}
