<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TransactionManagement\ProductTransaction;
use App\Models\ProductManagement\Product;
use App\Models\TransactionManagement\Transaction;
use Faker\Generator as Faker;

$factory->define(ProductTransaction::class, function (Faker $faker) {
    $transaction_id = Transaction::all()->pluck('id');
    $product_id = Product::all()->pluck('id');
    return [
        'transaction_id'    => 2,
        'product_id'        => $faker->randomElement($product_id),
        'quantity'          => 100,
    ];
});
