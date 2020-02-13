<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products\product_transaction;
use App\Models\Products\Product;
use App\Models\Account_Info_s\Transaction;
use Faker\Generator as Faker;

$factory->define(product_transaction::class, function (Faker $faker) {
    $transaction_id = Transaction::all()->pluck('id');
    $product_id = Product::all()->pluck('id');
    return [
        'transaction_id'    => $faker->randomElement($transaction_id),
        'product_id'        => $faker->randomElement($product_id),
    ];
});
