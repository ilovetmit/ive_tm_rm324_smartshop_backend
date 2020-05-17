<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TransactionManagement\Transaction;
use App\Models\UserManagement\User;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    $user_id = User::all()->pluck('id');
    return [
        'header'        => $faker->realText($maxNbChars = 30, $indexSize = 2),
        'user_id'       => $faker->randomElement($user_id),
        'amount'        => $faker->numberBetween($min = 10, $max = 264),
        'balance'       => $faker->numberBetween($min = 50, $max = 100),
        'currency'      => $faker->numberBetween($min = 1, $max = 2),
    ];
});
