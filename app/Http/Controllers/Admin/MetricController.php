<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class MetricController extends Controller
{
    public function index()
    {
        Gate::authorize('admin_view_metrics');

        $replenishesBuilder = Transaction::query()->replenishes()->successful();
        $pendingWithdrawsBuilder = Transaction::query()->withdraws()->pending();
        $withdrawsBuilder = Transaction::query()->withdraws()->successful();

        $replenishesTotal = (clone $replenishesBuilder)->sum('amount');
        $replenishesDaily = (clone $replenishesBuilder)->lastDay()->sum('amount');
        $replenishesTotalCount = (clone $replenishesBuilder)->count();
        $replenishesDailyCount = (clone $replenishesBuilder)->lastDay()->count();

        $pendingWithdrawsTotal = (clone $pendingWithdrawsBuilder)->sum('amount');
        $pendingWithdrawsDaily = (clone $pendingWithdrawsBuilder)->lastDay()->sum('amount');
        $pendingWithdrawsTotalCount = (clone $pendingWithdrawsBuilder)->count();
        $pendingWithdrawsDailyCount = (clone $pendingWithdrawsBuilder)->lastDay()->count();

        $withdrawsTotal = (clone $withdrawsBuilder)->sum('amount');
        $withdrawsDaily = (clone $withdrawsBuilder)->lastDay()->sum('amount');
        $withdrawsTotalCount = (clone $withdrawsBuilder)->count();
        $withdrawsDailyCount = (clone $withdrawsBuilder)->lastDay()->count();

        $loadTotal = $withdrawsTotal / ($replenishesTotal === 0 ? 1 : $replenishesTotal) * 100;
        $loadDaily = $withdrawsDaily / ($replenishesDaily === 0 ? 1 : $replenishesDaily) * 100;

        $incomeDaily = User::all()->sum('daily_income');

        $balance = $replenishesTotal - $withdrawsTotal;

        $usersTotal = User::count();
        $usersDaily = User::registeredLastDay()->count();

        return view('admin.metrics.index', compact(
            'replenishesTotal',
            'replenishesDaily',
            'replenishesTotalCount',
            'replenishesDailyCount',
            'pendingWithdrawsTotal',
            'pendingWithdrawsDaily',
            'pendingWithdrawsTotalCount',
            'pendingWithdrawsDailyCount',
            'withdrawsTotal',
            'withdrawsDaily',
            'withdrawsTotalCount',
            'withdrawsDailyCount',
            'loadTotal',
            'loadDaily',
            'incomeDaily',
            'balance',
            'usersTotal',
            'usersDaily'
        ));
    }
}
