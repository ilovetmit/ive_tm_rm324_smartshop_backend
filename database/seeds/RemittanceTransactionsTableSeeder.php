<?php

use Illuminate\Database\Seeder;
use App\Models\InformationManagement\remittance_transaction;

class RemittanceTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(remittance_transaction::class,1)->create();
    }
}
