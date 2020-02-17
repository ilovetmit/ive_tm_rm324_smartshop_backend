<?php

use Illuminate\Database\Seeder;
use App\Models\InformationManagement\Transaction;

class TransactionsTableSeeder extends Seeder
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
