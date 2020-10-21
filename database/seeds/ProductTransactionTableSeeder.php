<?php

use Illuminate\Database\Seeder;
use App\Models\TransactionManagement\ProductTransaction;
use App\Models\ProductManagement\Product;

class ProductTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(ProductTransaction::class,1)->create();

        $faker = Faker\Factory::create();
        $transaction_id = [1];

        for ($i = 1; $i <= 1; $i++) {
            $product_id = $faker->numberBetween($min = 1, $max = 35);
            if ($product_id == 24 || $product_id == 25 || $product_id == 26 || $product_id == 27 || $product_id == 28) {
                ProductTransaction::create([
                    'transaction_id'        => $transaction_id[$i - 1],
                    'product_id'            => $product_id,
                    'quantity'              => $faker->numberBetween($min = 1, $max = 3),
                    'shop_type'             => $faker->numberBetween($min = 1, $max = 2),
                ]);
            }else{
                ProductTransaction::create([
                    'transaction_id'        => $transaction_id[$i - 1],
                    'product_id'            => $product_id,
                    'quantity'              => $faker->numberBetween($min = 1, $max = 3),
                    'shop_type'             => 2,
                ]);
            }
        }
    }
}
