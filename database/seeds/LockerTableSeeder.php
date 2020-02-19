<?php

use Illuminate\Database\Seeder;
use App\Models\LockerManagement\Locker;

class LockerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Locker::class,1)->create();
    }
}
