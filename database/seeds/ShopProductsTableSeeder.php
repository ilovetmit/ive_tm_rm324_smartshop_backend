<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\ShopProductManagement\shop_product;

class ShopProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(shop_product::class,1)->create();
    }
}
