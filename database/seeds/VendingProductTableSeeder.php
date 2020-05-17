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

        for ($i = 1; $i <= 5; $i++) {
            VendingProduct::create([
                'product_id'    => $product_id++,
                'channel'       => $i,
            ]);
        }
    }
}
