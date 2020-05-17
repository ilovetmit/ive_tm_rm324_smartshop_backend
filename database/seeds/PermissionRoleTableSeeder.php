<?php

use Illuminate\Database\Seeder;
use App\Models\UserManagement\Role;
use App\Models\UserManagement\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::findOrFail(1)->hasPermission()->sync([1,2,3,4,5]);
        // Role::findOrFail(2)->hasPermission()->sync([6,7,8,9,10]);
        
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->hasPermission()->sync($admin_permissions->pluck('id'));

        // $user_permissions = $admin_permissions->filter(function ($permission) {
            // need to rebuild the function with consider menu access permission (17/2)
        //     return substr($permission->name, 0, 5) != 'user_' && substr($permission->name, 0, 5) != 'role_' && substr($permission->name, 0, 11) != 'permission_';
        // });
        // Role::findOrFail(2)->hasPermission()->sync($user_permissions);
    }
}
