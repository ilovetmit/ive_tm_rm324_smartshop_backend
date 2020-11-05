<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\Product;

class ProductTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::find(1)->hasTag()->sync([5,8]);
        Product::find(2)->hasTag()->sync([6,10]);
        Product::find(3)->hasTag()->sync([6,10]);
        Product::find(4)->hasTag()->sync([6,10]);
        Product::find(5)->hasTag()->sync([6,10]);
        Product::find(6)->hasTag()->sync([6,10]);

        Product::find(7)->hasTag()->sync([1,5,7]);
        Product::find(8)->hasTag()->sync([1,5,7]);
        Product::find(9)->hasTag()->sync([2,3,10]);
        Product::find(10)->hasTag()->sync([2,3]);
        Product::find(11)->hasTag()->sync([1]);
        Product::find(12)->hasTag()->sync([2,4]);
        Product::find(13)->hasTag()->sync([4,10]);
        Product::find(14)->hasTag()->sync([2,7]);
        Product::find(15)->hasTag()->sync([2,4]);
        Product::find(16)->hasTag()->sync([4,10]);
        Product::find(17)->hasTag()->sync([2,7,10]);
        Product::find(18)->hasTag()->sync([2]);
        Product::find(19)->hasTag()->sync([5,10]);
        Product::find(20)->hasTag()->sync([5,8]);
        Product::find(21)->hasTag()->sync([5,8]);
        Product::find(22)->hasTag()->sync([5,8]);
        Product::find(23)->hasTag()->sync([5,8,10]);
        Product::find(24)->hasTag()->sync([6,7,10]);
        Product::find(25)->hasTag()->sync([6,10]);
        Product::find(26)->hasTag()->sync([6,7]);
        Product::find(27)->hasTag()->sync([6,10]);
        Product::find(28)->hasTag()->sync([6]);
        Product::find(29)->hasTag()->sync(2);
        Product::find(30)->hasTag()->sync([5,7,10]);
        Product::find(31)->hasTag()->sync([5,7]);
        Product::find(32)->hasTag()->sync([5,10]);
        Product::find(33)->hasTag()->sync([5]);
        Product::find(34)->hasTag()->sync([5,10]);
        Product::find(35)->hasTag()->sync([5,10]);

    }
}
