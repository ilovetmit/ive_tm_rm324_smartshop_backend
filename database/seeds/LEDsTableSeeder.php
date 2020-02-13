<?php

use Illuminate\Database\Seeder;

class LEDsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Products\LED::class,1)->create();
    }
}
