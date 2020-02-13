<?php

use Illuminate\Database\Seeder;
use App\Models\Accounts\Role;

class RolesTableSeeder extends Seeder
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
            ],
            [
                'name'  => 'User',
            ],
        ];

        Role::insert($roles);
    }
}
