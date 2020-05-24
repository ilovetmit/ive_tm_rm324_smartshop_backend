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
        factory(Address::class, 10)->create();
        Address::create([
            'user_id'           => 11,
            'district'          => 3,
            'address1'          => 'RM 402',
            'address2'          => '18 Tsing Wun Road',
        ]);
    }
}
