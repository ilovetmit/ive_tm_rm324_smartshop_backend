<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\Product;

class ProductTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::findOrFail(1)->hasTag()->sync(1);
    }
}
