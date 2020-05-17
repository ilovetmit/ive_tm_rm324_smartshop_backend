<?php

use Illuminate\Database\Seeder;
use App\Models\InformationManagement\Interest;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Interest::class,1)->create();

        $interest = ['Yoga', 'Fashion Design', 'Magic', 'Reading', 'Chess', 'Painting and Drawing', 'Biking', 'Dancing', 'Collecting', 'Travelling'];
        $faker = Faker\Factory::create();

        for ($i = 0; $i <= 9; $i++) {
            Interest::create([
                'name'          => $interest[$i],
                'description'   => $faker->realText($maxNbChars = 25, $indexSize = 2),
            ]);
        }
    }
}
