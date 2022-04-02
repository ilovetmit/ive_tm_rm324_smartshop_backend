<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\Product;
use App\Models\ProductManagement\Category;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::findOrFail(1)->hasProduct()->sync([1,2,3,4,5,6,7,8,9,10,11,12]);

        Category::findOrFail(2)->hasProduct()->sync([13,14,15,16,17,18]);

        Category::findOrFail(3)->hasProduct()->sync([19,20,21,22,23]);

        Category::findOrFail(4)->hasProduct()->sync([24,25,26,27,28]);

        Category::findOrFail(5)->hasProduct()->sync([29,30,31,32]);

        Category::findOrFail(6)->hasProduct()->sync([33,34,35]);
    }
}
