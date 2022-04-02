<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\OnSell\ShopProduct;
use Illuminate\Support\Str;

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

        for ($i = 1; $i <= 35; $i++) {
            ShopProduct::create([
                'product_id'    => $i,
                'qrcode'        => 'PRODUCT-' . Str::random(8),
            ]);
        }
    }
}
