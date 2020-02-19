<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\OnSell\ShopProduct;

class ShopProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShopProduct::class,1)->create();
    }
}
