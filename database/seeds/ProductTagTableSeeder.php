<?php

use App\Models\Products\Product;
use Illuminate\Database\Seeder;

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
