<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUser;
use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        Gate::authorize('admin_view_users');

        $users = User::query()
            ->when(request('name'), fn($query, $name) => $query->fullName($name))
            ->when(request('contacts'),
                fn($query, $contacts) => $query
                    ->where('email', 'like', "%$contacts%")
                    ->orWhere('phone', 'like', "%$contacts%"))
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function search(Request $request): RedirectResponse
    {
        return redirect()->route('admin.users.index', $request->except('_token'));
    }

    public function show(User $user)
    {
        Gate::authorize('admin_view_user');

        [
            $packets,
            $packetOptions,
            $referrals,
            $transactions,
            $packetIncomeTransactions,
            $bonuses,
            $replenishTotal,
            $withdrawTotal,
            $transferUsers
        ] = $this->userService->show($user);

        return view('admin.users.show', compact(
            'user',
            'packets',
            'packetOptions',
            'referrals',
            'transactions',
            'packetIncomeTransactions',
            'bonuses',
            'replenishTotal',
            'withdrawTotal',
            'transferUsers',
        ));
    }

    public function edit(User $user)
    {
        Gate::authorize('admin_edit_user');

        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(StoreUser $request, User $user): RedirectResponse
    {
        Gate::authorize('admin_edit_user');

        $this->userService->update($user, $request->all());

        return redirect()->route('admin.users.show', $user);
    }

    public function ban(User $user): RedirectResponse
    {
        Gate::authorize('admin_ban_user');

        $this->userService->ban($user);

        return back();
    }

    public function unban(User $user): RedirectResponse
    {
        Gate::authorize('admin_unban_user');

        $this->userService->unban($user);

        return back();
    }

    public function disguise(Request $request, User $user): RedirectResponse
    {
        Gate::authorize('admin_disguise_user');

        $adminId = auth()->id();

        auth()->login($user);

        session()->regenerate();

        session()->put('disguised_admin_id', $adminId);

        return redirect()->route('profile');
    }
}
