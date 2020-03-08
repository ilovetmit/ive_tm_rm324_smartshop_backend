<?php

use Illuminate\Database\Seeder;
use App\Models\UserManagement\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'  => 'Admin',
                'description'   => 'all function permission allow',
            ],
            [
                'name'  => 'User',
                'description'   => '[UserManagement - Can not create][ProductManagement - Can not edit]',
            ],
        ];

        Role::insert($roles);
    }
}
