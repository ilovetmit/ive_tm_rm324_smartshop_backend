<?php

use Illuminate\Database\Seeder;
use App\Models\Accounts\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::findOrFail(1)->hasPermission()->sync([1,2,3,4]);
        Role::findOrFail(2)->hasPermission()->sync([5,6,7,8]);
    }
}
