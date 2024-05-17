<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ApplyMonthlyTurnoverBonus;
use App\Events\TransactionConfirmed;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Transaction;
use App\Models\User;
use App\Services\LoggerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DebugController extends Controller
{
    private LoggerService $loggerService;

    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    public function index()
    {
        Gate::authorize('admin_view_debugs');

        $users = User::all();

        return view('admin.debugs.index', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('admin_store_debugs');

        $request->validate([
            'action' => ['required', 'string', 'in:finance,monthly_turnover'],
            'user' => ['sometimes', 'required', 'exists:users,id'],
            'amount' => ['sometimes', 'required', 'numeric'],
        ]);

        if ($request->action === 'finance') {
            $user = User::find($request->user);
            $oldBalance = $user->balance;
            $transaction = $user->transactions()->create([
                'type' => Transaction::TYPE_REPLENISH,
                'amount' => $request->amount,
                'status' => 'success',
            ]);

            $transaction->user->forgetCachedBalance();
            $newBalance = $transaction->user->balance;

            $this->loggerService->log(Log::REPLENISH, $transaction->user, [
                'old_balance' => $oldBalance,
                'new_balance' => $newBalance,
                'transaction_id' => $transaction->id,
            ]);
            $this->loggerService->logAdmin(Log::ADMIN_DEBUG_REPLENISH, [
                'old_balance' => $oldBalance,
                'new_balance' => $newBalance,
                'transaction_id' => $transaction->id,
                'user_id' => $transaction->user->id,
            ]);

            event(new TransactionConfirmed($transaction));

            return back()->with('status', trans('general.success'));
        }
        if ($request->action === 'monthly_turnover') {
            with(new ApplyMonthlyTurnoverBonus())->__invoke();

            return back()->with('status', trans('general.success'));
        }

        return back();
    }
}
