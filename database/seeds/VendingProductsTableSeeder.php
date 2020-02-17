<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\vending_product;

class VendingProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(vending_product::class,1)->create();
    }
}
