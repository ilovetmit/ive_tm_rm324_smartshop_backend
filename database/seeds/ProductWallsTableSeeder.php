<?php

use Illuminate\Database\Seeder;

class ProductWallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Products\product_wall::class,1)->create();
    }
}
