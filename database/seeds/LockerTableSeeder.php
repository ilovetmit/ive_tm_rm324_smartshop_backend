<?php

use Illuminate\Database\Seeder;
use App\Models\LockerManagement\Locker;

class LockerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Locker::class,1)->create();

        // 'qrcode',
        // 'per_hour_price',
        // 'is_active',
        // 'is_using',

        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 6; $i++) {
            Locker::create([
                'qrcode'            =>  '',
                'per_hour_price'    =>  $faker->numberBetween($min = 50, $max = 200),
                'is_active'         =>  $faker->randomElement(['1', '2']),
                'is_using'          =>  $faker->randomElement(['1', '2']),
            ]);
        }
    }
}
