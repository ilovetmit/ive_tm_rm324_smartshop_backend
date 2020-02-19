<?php

use Illuminate\Database\Seeder;
use App\Models\TransactionManagement\RemittanceTransaction;

class RemittanceTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RemittanceTransaction::class,1)->create();
    }
}
