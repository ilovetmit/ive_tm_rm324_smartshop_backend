<?php

use Illuminate\Database\Seeder;
use App\Models\UserManagement\User;

class UserInterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::findOrFail(1)->hasInterest()->sync(1);
        User::findOrFail(2)->hasInterest()->sync(1);
    }
}
