<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Account_Info_s\remittance_transaction;
use App\Models\Account_Info_s\Transaction;
use App\Models\Accounts\User;
use Faker\Generator as Faker;

$factory->define(remittance_transaction::class, function (Faker $faker) {
    $user_id = User::all()->pluck('id');
    $transaction_id = Transaction::all()->pluck('id');
    return [
        'transaction_id'    => $faker->randomElement($transaction_id),
        'remittee_id'       => $faker->randomElement($user_id),
    ];
});
