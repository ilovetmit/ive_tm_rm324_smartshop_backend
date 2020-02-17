<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class,1)->create();
    }
}
