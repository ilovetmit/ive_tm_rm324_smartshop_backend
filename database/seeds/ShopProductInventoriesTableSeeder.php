<?php

use Illuminate\Database\Seeder;

class ShopProductInventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Products\shop_product_inventory::class,1)->create();
    }
}
