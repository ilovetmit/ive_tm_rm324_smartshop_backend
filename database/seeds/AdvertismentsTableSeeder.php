<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\AdvertismentManagement\Advertisment;

class AdvertismentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Advertisment::class,1)->create();
    }
}
