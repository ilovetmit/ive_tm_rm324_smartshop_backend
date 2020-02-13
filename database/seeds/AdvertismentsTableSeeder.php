<?php

use Illuminate\Database\Seeder;

class AdvertismentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Products\Advertisment::class,1)->create();
    }
}
