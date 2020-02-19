<?php

use Illuminate\Database\Seeder;
use App\Models\TransactionManagement\LockerTransaction;

class LockerTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LockerTransaction::class,1)->create();
    }
}
