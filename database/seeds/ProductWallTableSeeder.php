<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\ProductWall;
use App\Models\ProductManagement\Product;

class ProductWallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(ProductWall::class,1)->create();

        $faker = Faker\Factory::create();
        $product_id = Product::all()->pluck('id');

        for ($i = 1; $i <= 10; $i++) {
            if ($i != 10) {
                ProductWall::create([
                    'qrcode'        => 'wall-00' . $i,
                    'product_id'    => $faker->randomElement($product_id),
                    'message'       => $faker->realText($maxNbChars = 30, $indexSize = 2),
                ]);
            } else {
                ProductWall::create([
                    'qrcode'        => 'wall-010',
                    'product_id'    => $faker->randomElement($product_id),
                    'message'       => $faker->realText($maxNbChars = 30, $indexSize = 2),
                ]);
            }
        }
    }
}
