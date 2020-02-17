<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\ShopProductManagement\LED;

class LEDsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LED::class,1)->create();
    }
}
