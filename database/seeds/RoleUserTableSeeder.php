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
        User::findOrFail(3)->hasRole()->sync(2);
        User::findOrFail(4)->hasRole()->sync(2);
        User::findOrFail(5)->hasRole()->sync(2);
        User::findOrFail(6)->hasRole()->sync(2);
        User::findOrFail(7)->hasRole()->sync(2);
        User::findOrFail(8)->hasRole()->sync(2);
        User::findOrFail(9)->hasRole()->sync(2);
        User::findOrFail(10)->hasRole()->sync(2);
    }
}
