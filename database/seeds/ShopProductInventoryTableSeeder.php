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

        for ($i = 1; $i <= 35; $i++) {
            for ($ix = 1; $ix <= 5; $ix++) {
                ShopProductInventory::create([
                    'shop_product_id'   => $i,
                    'rfid_code'         => Str::random(16),
                    'is_sold'           => 1,
                ]);
            }
        }
    }
}
