<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\InformationManagement\remittance_transaction;
use App\Models\InformationManagement\Transaction;
use App\Models\UserManagement\User;
use Faker\Generator as Faker;

$factory->define(remittance_transaction::class, function (Faker $faker) {
    $user_id = User::all()->pluck('id');
    $transaction_id = Transaction::all()->pluck('id');
    return [
        'transaction_id'    => $faker->randomElement($transaction_id),
        'remittee_id'       => 1, // $faker->randomElement($user_id),
    ];
});
