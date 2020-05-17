<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Category::class,1)->create();
        $faker = Faker\Factory::create();

        $category = [ 'Drink', 'Technology', 'Daily necessities', 'IVE', 'Other', 'Fashion' ];
        for ($i = 0; $i <= 5; $i++) {
            Category::create([
                'name'          => $category[$i],
                'description'   => $faker->realText($maxNbChars = 150, $indexSize = 2),
            ]);
        }
    }
}