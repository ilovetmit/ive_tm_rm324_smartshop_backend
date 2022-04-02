<?php

use Illuminate\Database\Seeder;
use App\Models\AdvertisementManagement\Advertisement;

class AdvertisementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Advertisement::class,10)->create();

        $header = [
            'Back to School Sales',
            'Custowen Appreciation 30% OFF',
            'Funny Easter Egg',
            'Eat Drink Carve',
            'Extra 40% OFF',
            'Macau Tour On Sale',
            'Sample Sale',
            'Taste Of Brockport',
        ];

        $image = [
            'back_to_school_sales.jpg',
            'custowen_appreciation.jpg',
            'easter_egg.jpg',
            'eat_drink_carve.jpg',
            'forty_off.jpg',
            'macau_tour_packages.jpg',
            'sample_sales.jpg',
            'taste_of_brockport.jpg',
        ];

        $faker = Faker\Factory::create();

        for ($i = 1; $i < 8; $i++) {
            Advertisement::create([
                'header'        => $header[$i],
                'image'         => $image[$i],
                'description'   => $faker->realText($maxNbChars = 150, $indexSize = 2),
                'status'        => $faker->randomElement(['1', '2']),
            ]);
        }
    }
}
