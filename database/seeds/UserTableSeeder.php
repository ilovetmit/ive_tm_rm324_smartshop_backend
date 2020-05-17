<?php

use Illuminate\Database\Seeder;
use App\Models\UserManagement\User;
use Faker\Generator as Faker;
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
        $user = [
            [
                'email'                 => 'admin@admin.com',
                'first_name'            => 'Smart Shop',
                'last_name'             => 'FYP',
                'password'              => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'avatar'                => 'person.png',
                'birthday'              => '1921-09-28',
                'telephone'             => '24605375',
                'bio'                   => 'This is VTC(TM) student Final Year Project',
                'gender'                => 1,
                'status'                => 1,
                'email_verified_at'     => now(),
                'remember_token'        => '',
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
        ];
        User::insert($user);
        factory(\App\Models\UserManagement\User::class,9)->create();
    }
}
