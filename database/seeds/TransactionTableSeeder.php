<?php

use Illuminate\Database\Seeder;
use App\Models\TransactionManagement\Transaction;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transaction::class, 10)->create();

        $faker = Faker\Factory::create();

        Transaction::create([
            'header'        => $faker->realText($maxNbChars = 30, $indexSize = 2),
            'user_id'       => 11,
            'amount'        => $faker->numberBetween($min = 10, $max = 264),
            'balance'       => $faker->numberBetween($min = 50, $max = 100),
            'currency'      => $faker->numberBetween($min = 1, $max = 2),
        ]);
        Transaction::create([
            'header'        => $faker->realText($maxNbChars = 30, $indexSize = 2),
            'user_id'       => 11,
            'amount'        => $faker->numberBetween($min = 10, $max = 264),
            'balance'       => $faker->numberBetween($min = 50, $max = 100),
            'currency'      => $faker->numberBetween($min = 1, $max = 2),
        ]);
        Transaction::create([
            'header'        => $faker->realText($maxNbChars = 30, $indexSize = 2),
            'user_id'       => 11,
            'amount'        => $faker->numberBetween($min = 10, $max = 264),
            'balance'       => $faker->numberBetween($min = 50, $max = 100),
            'currency'      => $faker->numberBetween($min = 1, $max = 2),
        ]);
    }
}
