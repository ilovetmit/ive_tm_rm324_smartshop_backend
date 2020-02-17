<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\ShopProductManagement\shop_product_inventory;

class ShopProductInventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(shop_product_inventory::class,1)->create();
    }
}
