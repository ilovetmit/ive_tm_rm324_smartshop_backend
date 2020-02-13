<?php

use Illuminate\Database\Seeder;

class LockerTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Lockers\locker_transaction::class,1)->create();
    }
}
