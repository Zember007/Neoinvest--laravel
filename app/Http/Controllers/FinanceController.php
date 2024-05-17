<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinance;
use App\Models\User;
use App\Services\TransactionService;
use Illuminate\Http\RedirectResponse;

class FinanceController extends Controller
{
    public function index()
    {
        $transactions = auth()->user()->transactions()->withoutCreated()->latest()->get();
        $transfers = auth()->user()->transactions()->transfers()->successful()->get();
        $transferUserIds = $transfers->pluck('payload.receiver_id')
            ->merge($transfers->pluck('payload.sender_id'))
            ->filter(fn($id) => ! is_null($id))
            ->unique()
            ->values()
            ->all();
        $users = User::query()
            ->whereIn('id', $transferUserIds)
            ->get();

        return view('finances')->with(compact('transactions', 'users'));
    }

    public function store(StoreFinance $request, TransactionService $transactionService): RedirectResponse
    {
        return $transactionService->create($request->user(), $request->all());
    }
}
