<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TransactionManagement\RemittanceTransaction;
use App\Models\TransactionManagement\Transaction;
use App\Models\UserManagement\User;
use Faker\Generator as Faker;

$factory->define(RemittanceTransaction::class, function (Faker $faker) {
    $user_id = User::all()->pluck('id');
    $transaction_id = Transaction::all()->pluck('id');
    return [
        'transaction_id'    => $faker->randomElement($transaction_id),
        'remittee_id'       => 1, // $faker->randomElement($user_id),
    ];
});
