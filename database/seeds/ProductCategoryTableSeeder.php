<?php

use App\Models\Products\Product;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::findOrFail(1)->hasCategory()->sync(1);
    }
}
