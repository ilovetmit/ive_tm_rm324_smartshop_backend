<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\VendingMachine\VendingProduct;

class VendingProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VendingProduct::class,1)->create();
    }
}
