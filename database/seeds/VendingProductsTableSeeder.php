<?php

use Illuminate\Database\Seeder;

class VendingProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Products\vending_product::class,1)->create();
    }
}
