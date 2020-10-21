<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\VendingMachine\VendingProduct;

class VendingProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(VendingProduct::class,1)->create();

        $faker = Faker\Factory::create();

        static $product_id = 24;

        VendingProduct::create([
            'product_id'    => 15,
            'channel'       => 1,
        ]);

        for ($i = 2; $i <= 6; $i++) {
            VendingProduct::create([
                'product_id'    => $product_id++,
                'channel'       => $i,
            ]);
        }


    }
}
