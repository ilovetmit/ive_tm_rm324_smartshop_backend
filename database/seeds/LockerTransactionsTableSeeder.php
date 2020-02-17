<?php

use Illuminate\Database\Seeder;
use App\Models\LockerManagement\locker_transaction;

class LockerTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(locker_transaction::class,1)->create();
    }
}
