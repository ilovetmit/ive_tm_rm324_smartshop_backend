<?php

use Illuminate\Database\Seeder;
use App\Models\UserManagement\User;

class InterestUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::findOrFail(1)->hasInterest()->sync([1,2,3]);
        // User::findOrFail(1)->hasInterest()->sync(2);
        // User::findOrFail(1)->hasInterest()->sync(3);

        $faker = Faker\Factory::create();

        $array = [];

        for ($i = 2; $i <= 10; $i++) {

            (int)$count = 0;
            (int)$random_1 = $faker->numberBetween($min = 1, $max = 10);
            (int)$random_2 = $faker->numberBetween($min = 1, $max = 10);

            if ($random_1 > $random_2) {
                for ($random_2; $random_2 <= $random_1; $random_2++) {
                    $array[$count] = $random_2;
                    $count++;
                }
            } else if ($random_1 < $random_2) {
                for ($random_1; $random_1 <= $random_2; $random_1++) {
                    $array[$count] = $random_1; 
                    $count++;
                }
            }
            User::findOrFail($i)->hasInterest()->sync($array);
        }
    }
}
