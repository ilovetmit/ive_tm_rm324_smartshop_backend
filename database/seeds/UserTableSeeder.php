<?php

use App\Models\InformationManagement\Address;
use Illuminate\Database\Seeder;
use App\Models\UserManagement\User;
use Illuminate\Support\Facades\Hash;
use App\Models\InformationManagement\BankAccount;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $admin = User::create([
            'email'                 => 's-shop-tmit@vtc.edu.hk',
            'first_name'            => 'Smart Shop TMIT',
            'last_name'             => 'VTC',
            'password'              => Hash::make('ilovetmit'),
            'avatar'                => 'person.png',
            'birthday'              => '2019-09-01',
            'telephone'             => '24605375',
            'bio'                   => 'I LOVE VTC.',
            'gender'                => 2,
            'status'                => 1,
            'email_verified_at'     => now(),
        ]);

        $admin->hasRole()->sync(1);

        Address::create([
            'user_id'           => 1,
            'district'          => 3,
            'address1'          => 'RM 402',
            'address2'          => '18 Tsing Wun Road',
        ]);

        BankAccount::create([
            'user_id'           => 1,
            'current_account'   => 99999,
            'saving_account'    => 99999
        ]);

        $userCount = 50;

        for ($i = 1; $i <= $userCount; $i++) {

            $gender = $faker->randomElement(['1', '2']);
            $status = $faker->randomElement(['1', '2']);
            $phoneNumber = $faker->numberBetween($min = 51111111, $max = 69999999);
            $birthday = $faker->dateTimeThisCentury->format('Y-m-d');

            $u = User::create([
                "email"                 => "user" . str_pad((string) $i, 4, "0", STR_PAD_LEFT) . "@sshoptmit.vtc.edu.hk",
                'first_name'            => 'User',
                'last_name'             => $i,
                'password'              => Hash::make('ilovetmit'),
                'avatar'                => 'person.png',
                'birthday'              => $birthday,
                'telephone'             => $phoneNumber,
                'bio'                   => 'I LOVE VTC.',
                'gender'                => $gender,
                'status'                => 1,
                'email_verified_at'     => now(),
            ]);

            $u->hasRole()->sync(2);

            BankAccount::create([
                'user_id'           => $u->id,
                'current_account'   => 5000,
                'saving_account'    => 3000,
            ]);

            Address::create([
                'user_id'           => $u->id,
                'district'          => 3,
                'address1'          => 'RM 402',
                'address2'          => '18 Tsing Wun Road',
            ]);
        }

    }
}
