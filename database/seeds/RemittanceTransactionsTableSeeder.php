<?php

use Illuminate\Database\Seeder;

class RemittanceTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Account_Info_s\remittance_transaction::class,1)->create();
    }
}
