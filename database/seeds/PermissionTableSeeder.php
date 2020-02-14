<?php

use Illuminate\Database\Seeder;
use App\Models\Accounts\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // permission
            [
                'name'  => 'permission_create',
            ],
            [
                'name'  => 'permission_edit',
            ],
            [
                'name'  => 'permission_view',
            ],
            [
                'name'  => 'permission_delete',
            ],
            [
                'name'  => 'permission_access',
            ],
            // interest
            [
                'name'  => 'user_create',
            ],
            [
                'name'  => 'user_edit',
            ],
            [
                'name'  => 'user_view',
            ],
            [
                'name'  => 'user_delete',
            ],
            [
                'name'  => 'user_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
