<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Account_Info_s\Transaction;
use App\Models\Accounts\User;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    // $user_id = User::all()->pluck('id');
    return [
        'header'        => $faker->text($maxNbChars = 7),
        'user_id'       => 2, // $faker->randomElement($user_id),
        'amount'        => $faker->numberBetween($min = 10, $max = 40),
        'balance'       => $faker->numberBetween($min = 50, $max = 100),
        'curreny'       => $faker->numberBetween($min = 1, $max = 2),
    ];
});
