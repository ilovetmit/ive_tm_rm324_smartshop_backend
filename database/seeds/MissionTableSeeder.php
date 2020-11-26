<?php

use App\Models\Mission;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class MissionTableSeeder extends Seeder
{
    public function run()
    {
        Mission::create([
            "name" => "M-324-15",
            "coins" => 50,
        ]);

        Mission::create([
            "name" => "M-324-16",
            "coins" => 50
        ]);

        Mission::create([
            "name" => "M-324-17",
            "coins" => 50
        ]);
    }
}
