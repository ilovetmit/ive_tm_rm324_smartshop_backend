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
        Product::find(1)->hasTag()->sync([1,5,7]);
        Product::find(2)->hasTag()->sync([1,5,7]);
        Product::find(3)->hasTag()->sync([2,3,10]);
        Product::find(4)->hasTag()->sync([2,3]);
        Product::find(5)->hasTag()->sync([1]);
        Product::find(6)->hasTag()->sync([2,4]);
        Product::find(7)->hasTag()->sync([4,10]);
        Product::find(8)->hasTag()->sync([2,7]);
        Product::find(9)->hasTag()->sync([2,4]);
        Product::find(10)->hasTag()->sync([4,10]);
        Product::find(11)->hasTag()->sync([2,7,10]);
        Product::find(12)->hasTag()->sync([2]);

        // 1 'soft drink'
        // 2 'health'
        // 3 'juice'
        // 4 'tea'
        // 5 'trend'
        // 6 'Homeware'
        // 7 'hot'
        // 8 'smart'
        // 9 'on sale'
        // 10 'new'

        // 1 'D_7 Up - Bottle 550mL.jpg',
        // 2 'D_Coca Cola Coke - Bottle 500mL.jpg',
        // 3 'D_Hi-C Soya Milk - Melon Flavoured 250mL.jpg',
        // 4 'D_orange juice.jpg',
        // 5 'D_Pepsi Coke - Bottle 500mL.jpg',
        // 6 'D_Tao Ti Mandarin Lemon Drink 250mL.jpg',
        // 7 'D_Vita Chrysanthemum Tea 250mL.jpg',
        // 8 'D_Vita Gor Yin Hai Peach Tea 250mL.jpg',
        // 9 'D_Vita Japanese Style Peach Tea Drink 250mL.jpg',
        // 10 'D_Vita Lemon Tea 250mL.jpg',
        // 11 'D_Vitasoy Soya Bean Milk - Malted 250mL.jpg',
        // 12 'D_Vitasoy Soya Bean Milk 250mL.jpg',

        Product::find(13)->hasTag()->sync([5,10]);
        Product::find(14)->hasTag()->sync([5,8]);
        Product::find(15)->hasTag()->sync([5,8]);
        Product::find(16)->hasTag()->sync([5,8]);
        Product::find(17)->hasTag()->sync([5,8]);
        Product::find(18)->hasTag()->sync([5,8,10]);

        // 13 'E_camera.jpg',
        // 14 'E_earphone.jpg',
        // 15 'E_e-connect.jpg',
        // 16 'E_i-stationery.jpg',
        // 17 'E_i-watch.jpg',
        // 18 'E_tablet.jpg',



            // 19 'N_body oil.jpg',
            // 20 'N_shampoo.jpg',
            // 21 'N_skin care package 1.jpg',
            // 22 'N_skin care package 2.jpg',
            // 23 'N_toothbrush.jpg',

        Product::find(19)->hasTag()->sync([6,7,10]);
        Product::find(20)->hasTag()->sync([6,10]);
        Product::find(21)->hasTag()->sync([6,7]);
        Product::find(22)->hasTag()->sync([6,10]);
        Product::find(23)->hasTag()->sync([6]);


            // 24 'N_VTC daily necessities 1.jpg',
            // 25 'N_VTC daily necessities 2.jpg',
            // 26 'N_VTC daily necessities 3.jpg',
            // 27 'N_VTC daily necessities 4.jpg',
            // 28 'N_VTC daily necessities 5.jpg',
            // 29 'O_bike.jpg',
            // 30 'O_chair.jpg',
            // 31 'O_spoon.jpg',
            // 32 'OF_sport shoes.jpg',
            // 33 'OF_hand bag.jpg',
            // 34 'OF_sun-glass.jpg',
            // 35 'OF_trendy fashion.jpg'

        Product::find(24)->hasTag()->sync([6,10]);
        Product::find(25)->hasTag()->sync([6,10]);
        Product::find(26)->hasTag()->sync([6,10]);
        Product::find(27)->hasTag()->sync([6,10]);
        Product::find(28)->hasTag()->sync([6,10]);

        Product::find(29)->hasTag()->sync(2);
        // Product::find(30)->hasTag()->sync([6,10]);
        // Product::find(31)->hasTag()->sync([6,10]);

        Product::find(32)->hasTag()->sync([5,7,10]);
        Product::find(33)->hasTag()->sync([5,7]);
        Product::find(34)->hasTag()->sync([5,10]);
        Product::find(35)->hasTag()->sync([5]);


    }
}
