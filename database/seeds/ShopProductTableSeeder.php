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
        // factory(ShopProduct::class,1)->create();

        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 23; $i++) {
            ShopProduct::create([
                'product_id'    => $i,
                'qrcode'        => '',
            ]);
        }

        for ($ia = 29; $ia <= 35; $ia++) {
            ShopProduct::create([
                'product_id'    => $ia,
                'qrcode'        => '',
            ]);
        }

        
    }
}
