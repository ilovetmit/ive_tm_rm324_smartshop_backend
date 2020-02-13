<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Account_Info_s\Transaction;
use App\Models\Lockers\locker_transaction;
use App\Models\Lockers\Locker;
use App\Models\Accounts\User;
use Faker\Generator as Faker;

$factory->define(locker_transaction::class, function (Faker $faker) {
    $transaction_id = Transaction::all()->pluck('id');
    $locker_id = Locker::all()->pluck('id');
    $receiver_id = User::all()->pluck('id');
    return [
        'transaction_id'    => $faker->randomElement($transaction_id),
        'locker_id'         => $faker->randomElement($locker_id),
        'receiver_id'       => $faker->randomElement($receiver_id),
        'item'              => $faker->word,
        'deadline'          => $faker->dateTime($max = '+7 days'),
        'remark'            => $faker->text($maxNbChars = 20),
    ];
});
