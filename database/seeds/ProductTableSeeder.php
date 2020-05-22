<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Product::class,1)->create();
        $name = [
            '7 Up - Bottle 550mL',
            'Coca Cola Coke - Bottle 500mL',
            'Hi-C Soya Milk - Melon Flavoured 250mL',
            'orange juice',
            'Pepsi Coke - Bottle 500mL',
            'Tao Ti Mandarin Lemon Drink 250mL',
            'Vita Chrysanthemum Tea 250mL',
            'Vita Gor Yin Hai Peach Tea 250mL',
            'Vita Japanese Style Peach Tea Drink 250mL',
            'Vita Lemon Tea 250mL',
            'Vitasoy Soya Bean Milk - Malted 250mL',
            'Vitasoy Soya Bean Milk 250mL',
            'camera',
            'earphone',
            'e-connect',
            'i-stationery',
            'i-watch',
            'tablet',
            'body oil',
            'shampoo',
            'skin care package 1',
            'skin care package 2',
            'toothbrush',
            'VTC daily necessities 1',
            'VTC daily necessities 2',
            'VTC daily necessities 3',
            'VTC daily necessities 4',
            'VTC daily necessities 5',
            'bike',
            'chair',
            'spoon',
            'sport shoes',
            'hand bag',
            'sun-glass',
            'trendy fashion'
        ];

        $image = [
            'D_7_Up_-_Bottle_550mL.jpg',
            'D_Coca_Cola_Coke_-_Bottle_500mL.jpg',
            'D_Hi-C_Soya_Milk_-_Melon_Flavoured_250mL.jpg',
            'D_orange_juice.jpg',
            'D_Pepsi_Coke_-_Bottle_500mL.jpg',
            'D_Tao_Ti_Mandarin_Lemon_Drink_250mL.jpg',
            'D_Vita_Chrysanthemum_Tea_250mL.jpg',
            'D_Vita_Gor_Yin_Hai_Peach_Tea_250mL.jpg',
            'D_Vita_Japanese_Style_Peach_Tea_Drink_250mL.jpg',
            'D_Vita_Lemon_Tea_250mL.jpg',
            'D_Vitasoy_Soya_Bean_Milk_-_Malted_250mL.jpg',
            'D_Vitasoy_Soya_Bean_Milk_250mL.jpg',
            'E_camera.jpg',
            'E_earphone.jpg',
            'E_e-connect.jpg',
            'E_i-stationery.jpg',
            'E_i-watch.jpg',
            'E_tablet.jpg',
            'N_body_oil.jpg',
            'N_shampoo.jpg',
            'N_skin_care_package_1.jpg',
            'N_skin_care_package_2.jpg',
            'N_toothbrush.jpg',
            'N_VTC_daily_necessities_1.jpg',
            'N_VTC_daily_necessities_2.jpg',
            'N_VTC_daily_necessities_3.jpg',
            'N_VTC_daily_necessities_4.jpg',
            'N_VTC_daily_necessities_5.jpg',
            'O_bike.jpg',
            'O_chair.jpg',
            'O_spoon.jpg',
            'OF_sport_shoes.jpg',
            'OF_hand_bag.jpg',
            'OF_sun-glass.jpg',
            'OF_trendy_fashion.jpg'
        ];

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 35; $i++) {
            Product::create([
                'name'          => $name[$i],
                'price'         => $faker->numberBetween($min = 0, $max = 200),
                'quantity'      => $faker->numberBetween($min = 10, $max = 15),
                'image'         => $image[$i],
                'description'   => $faker->realText($maxNbChars = 60, $indexSize = 2),
                'status'        => $faker->randomElement(['1', '2']),
            ]);
        }
    }
}
