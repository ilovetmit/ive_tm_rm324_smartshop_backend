<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\OnSell\ShopProductInventory;
use Illuminate\Support\Str;

class ShopProductInventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(ShopProductInventory::class,1)->create();

        $faker = Faker\Factory::create();

        $products = \App\Models\ProductManagement\Product::all();

        foreach ($products as $product){
            for ($i = 1; $i <= $product->quantity; $i++) {
                ShopProductInventory::create([
                    'shop_product_id'   => $product->id,
                    'rfid_code'         => Str::random(16),
                    'is_sold'           => 1,
                ]);
            }
        }

    }
}
