<?php

use Illuminate\Database\Seeder;
use App\Models\UserManagement\User;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::findOrFail(1)->hasRole()->sync(1);
        User::findOrFail(2)->hasRole()->sync(2);
    }
}
