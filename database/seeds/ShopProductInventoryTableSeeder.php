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
        // factory(ShopProductInventory::class,1)->create();

        $faker = Faker\Factory::create();

        for ($i = 0; $i <= 50; $i++) {
            $is_sold = $faker->randomElement(['1', '2']);
            ShopProductInventory::create([
                'shop_product_id'   => 35,
                'rfid_code'         => $faker->md5,
                'is_sold'           => $is_sold,
            ]);
        }
    }
}
