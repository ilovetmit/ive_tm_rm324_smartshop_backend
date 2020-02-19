<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\ProductWall;

class ProductWallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductWall::class,1)->create();
    }
}
