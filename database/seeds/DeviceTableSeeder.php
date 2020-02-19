<?php

use Illuminate\Database\Seeder;
use App\Models\InformationManagement\Device;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Device::class,1)->create();
    }
}
