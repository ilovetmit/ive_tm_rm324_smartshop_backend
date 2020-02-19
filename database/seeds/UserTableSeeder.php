<?php

use Illuminate\Database\Seeder;
use App\Models\UserManagement\User;

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
                'first_name'            => 'firstName',
                'last_name'             => 'lastName',
                'password'              => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'avatar'                => 'avatar',
                'gender'                => 1,
                'status'                => 1,
            ],
            [
                'email'                 => 'user@user.com',
                'first_name'            => 'firstName',
                'last_name'             => 'lastName',
                'password'              => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'avatar'                => 'avatar',
                'gender'                => 1,
                'status'                => 1,
            ],
        ];
        User::insert($user);
        // factory(\App\Models\UserManagement\User::class,1)->create();
    }
}