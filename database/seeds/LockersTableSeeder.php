<?php

use Illuminate\Database\Seeder;

class LockersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Lockers\Locker::class,1)->create();
    }
}
