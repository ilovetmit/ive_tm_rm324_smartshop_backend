<?php

use App\Models\Mission;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class MissionSeederTableSeeder extends Seeder
{
    public function run()
    {
        Mission::create([
            "name" => "",
            "coins" => 50,
        ]);

        Mission::create([
            "name" => "",
            "coins" => 50
        ]);

        Mission::create([
            "name" => "",
            "coins" => 50
        ]);
    }
}
