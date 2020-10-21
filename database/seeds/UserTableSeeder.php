<?php

use Illuminate\Database\Seeder;
use App\Models\UserManagement\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
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

        User::create([
            'email'                 => 'admin@admin.com',
            'first_name'            => 'Smart Shop',
            'last_name'             => 'admin',
            'password'              => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'avatar'                => 'person.png',
            'birthday'              => '1921-09-28',
            'telephone'             => '24605375',
            'bio'                   => 'This is VTC(TM) student Final Year Project.',
            'gender'                => 1,
            'status'                => 1,
            'email_verified_at'     => now(),
        ]);
        factory(\App\Models\UserManagement\User::class, 9)->create();
        User::create([
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
    }
}
