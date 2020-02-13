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
                'name'  => 'role_create',
            ],
            [
                'name'  => 'role_edit',
            ],
            [
                'name'  => 'role_view',
            ],
            [
                'name'  => 'role_delete',
            ],
        ];

        Permission::insert($permissions);
    }
}
