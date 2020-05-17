<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserManagement\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['1', '2']);
    $status = $faker->randomElement(['1', '2']);
    $phoneNumber = $faker->numberBetween($min = 51111111, $max = 69999999);
    return [
        'email'             => $faker->unique()->safeEmail,
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'avatar'            => 'person.png',
        'birthday'          => $faker->dateTimeThisCentury->format('Y-m-d'),
        'gender'            => $gender,
        'telephone'         => $phoneNumber,
        'bio'               => $faker->text($maxNbChars = 50),
        'status'            => $status,
        'email_verified_at' => '',
        'remember_token'    => '',
    ];
});
