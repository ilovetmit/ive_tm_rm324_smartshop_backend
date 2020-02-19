<?php

use Illuminate\Database\Seeder;
use App\Models\TransactionManagement\Transaction;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transaction::class,1)->create();
    }
}
