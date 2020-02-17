<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\product_transaction;

class ProductTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(product_transaction::class,1)->create();
    }
}
