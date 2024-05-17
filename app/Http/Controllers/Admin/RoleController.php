<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRole;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize('admin_view_roles');

        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        Gate::authorize('admin_create_role');

        $permissions = Permission::all()->pluck('name');

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(StoreRole $request): RedirectResponse
    {
        Gate::authorize('admin_create_role');

        Role::query()
            ->create(['name' => $request->name, 'guard_name' => 'web'])
            ->givePermissionTo($request->permissions);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        Gate::authorize('admin_edit_role');

        $permissions = Permission::all()->pluck('name');
        $currentPermissions = $role->permissions->pluck('name');

        return view('admin.roles.edit', compact('role', 'permissions', 'currentPermissions'));
    }

    public function update(StoreRole $request, Role $role): RedirectResponse
    {
        Gate::authorize('admin_edit_role');

        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role): RedirectResponse
    {
        Gate::authorize('admin_delete_role');

        if ($role->is_locked) {
            return redirect()->route('admin.roles.index');
        }

        User::role($role)->get()->each(function ($user) {
            $user->syncRoles('user');
        });
        $role->delete();

        return redirect()->route('admin.roles.index');
    }
}
