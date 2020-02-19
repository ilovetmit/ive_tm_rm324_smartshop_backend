<?php

use Illuminate\Database\Seeder;
use App\Models\InformationManagement\Address;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Address::class,1)->create();
    }
}
