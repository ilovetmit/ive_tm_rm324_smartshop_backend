<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TransactionManagement\Transaction;
use App\Models\TransactionManagement\LockerTransaction;
use App\Models\LockerManagement\Locker;
use App\Models\UserManagement\User;
use Faker\Generator as Faker;

$factory->define(LockerTransaction::class, function (Faker $faker) {
    $transaction_id = Transaction::all()->pluck('id');
    $locker_id = Locker::all()->pluck('id');
    $receiver_id = User::all()->pluck('id');
    return [
        'transaction_id'    => 1,
        'locker_id'         => $faker->randomElement($locker_id),
        'recipient_user_id' => $faker->randomElement($receiver_id),
        'item'              => $faker->word,
        'deadline'          => $faker->dateTime($max = '+7 days'),
        'remark'            => $faker->text($maxNbChars = 20),
    ];
});
