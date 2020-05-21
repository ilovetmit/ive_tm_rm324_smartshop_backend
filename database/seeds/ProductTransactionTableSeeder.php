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
        $product_id = Product::all()->pluck('id');
        $transaction_id = array(1,3,5,6,7,9);
        
        for ($i = 1; $i <= 6; $i++) {
            ProductTransaction::create([
                'transaction_id'        => $transaction_id[$i-1],
                'product_id'            => $faker->randomElement($product_id),
                'quantity'              => $faker->numberBetween($min = 1, $max = 3),
            ]);
        }
    }
}
