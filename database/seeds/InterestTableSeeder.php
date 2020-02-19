<?php

use Illuminate\Database\Seeder;
use App\Models\InformationManagement\Interest;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Interest::class,1)->create();
    }
}
