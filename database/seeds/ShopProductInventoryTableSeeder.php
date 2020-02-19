<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\OnSell\ShopProductInventory;

class ShopProductInventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShopProductInventory::class,1)->create();
    }
}
