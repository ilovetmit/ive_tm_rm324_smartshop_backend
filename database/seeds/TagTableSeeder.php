<?php

use Illuminate\Database\Seeder;
use App\Models\TagManagement\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Tag::class,10)->create();
        $tag = ['Soft Drink', 'Health', 'Juice', 'Tea', 'Trend', 'Homeware', 'Hot', 'Smart', 'On Sale', 'New'];
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Tag::create([
                'name'          => $tag[$i],
                'description'   => $faker->realText($maxNbChars = 15, $indexSize = 2),
            ]);
        }
    }
}
