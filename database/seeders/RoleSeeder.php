<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run()
    {
        resolve(PermissionRegistrar::class)->forgetCachedPermissions();

        Permission::create(['name' => 'admin_access_cp']);
        Permission::create(['name' => 'admin_view_metrics']);
        Permission::create(['name' => 'admin_view_users']);
        Permission::create(['name' => 'admin_view_replenishments']);
        Permission::create(['name' => 'admin_view_withdrawals']);
        Permission::create(['name' => 'admin_view_packets']);
        Permission::create(['name' => 'admin_view_stars']);
        Permission::create(['name' => 'admin_view_promos']);
        Permission::create(['name' => 'admin_view_roles']);
        Permission::create(['name' => 'admin_view_user']);
        Permission::create(['name' => 'admin_edit_user']);
        Permission::create(['name' => 'admin_ban_user']);
        Permission::create(['name' => 'admin_unban_user']);
        Permission::create(['name' => 'admin_disguise_user']);
        Permission::create(['name' => 'admin_allow_withdraw']);
        Permission::create(['name' => 'admin_deny_withdraw']);
        Permission::create(['name' => 'admin_edit_packet']);
        Permission::create(['name' => 'admin_edit_star']);
        Permission::create(['name' => 'admin_create_promo']);
        Permission::create(['name' => 'admin_edit_promo']);
        Permission::create(['name' => 'admin_delete_promo']);
        Permission::create(['name' => 'admin_create_role']);
        Permission::create(['name' => 'admin_edit_role']);
        Permission::create(['name' => 'admin_delete_role']);
        Permission::create(['name' => 'admin_view_closing_packets']);
        Permission::create(['name' => 'admin_view_logs']);
        Permission::create(['name' => 'admin_view_debugs']);
        Permission::create(['name' => 'admin_store_debugs']);

        Role::create(['name' => 'user', 'is_locked' => true]);
        Role::create(['name' => 'admin', 'is_locked' => true])->givePermissionTo(Permission::all());
    }
}
