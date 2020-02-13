<?php

use Illuminate\Database\Seeder;

class ProductTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Products\product_transaction::class,1)->create();
    }
}
