<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\product_wall;

class ProductWallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(product_wall::class,1)->create();
    }
}
