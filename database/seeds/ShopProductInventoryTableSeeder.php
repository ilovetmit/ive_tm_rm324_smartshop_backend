<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\OnSell\ShopProductInventory;
use Illuminate\Support\Str;

class ShopProductInventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(ShopProductInventory::class,1)->create();

        $faker = Faker\Factory::create();

        $products = \App\Models\ProductManagement\Product::all();

        $shop_product = [
            1,2,3,4,5,6,
        ];

        $usb = [
            "E28011606000020E8CEC1B62",
            "E28011606000020BB66E4525",
            "E28011606000020BB66E342E",
            "E28011606000020E8CEC2A6A",
            "E28011606000020E8CEC2A69",
            "E28011606000020BB66E342D",
            "E28011606000020E8CEC1B61",
            "E28011606000020E8CEC1B60",
            "E28011606000020BB66E4523",
            "E28011606000020BB66E4524",
            "E28011606000020E8CEC2A6F",
            "E28011606000020BB66E342F",
            "E28011606000020E8CEC2A6D",
            "E28011606000020E8CEC2A6B",
            "E28011606000020E8CEC2A6C",
            "E28011606000020E8CEC2A6E",
            "E28011606000020BB66E4522",
            "E28011606000020BB66E4521",
            "E28011606000020BB66E4520",
            "E28011606000020BB66E4526",
        ];

        $brown_box = [
            "E28011606000020E8CEC1B62",
            "E28011606000020BB66E4525",
            "E28011606000020BB66E342E",
            "E28011606000020E8CEC2A6A",
            "E28011606000020E8CEC2A69",
            "E28011606000020BB66E342D",
            "E28011606000020E8CEC1B61",
            "E28011606000020E8CEC1B60",
            "E28011606000020BB66E4523",
            "E28011606000020BB66E4524",
            "E28011606000020E8CEC2A6F",
            "E28011606000020BB66E342F",
            "E28011606000020E8CEC2A6D",
            "E28011606000020E8CEC2A6B",
            "E28011606000020E8CEC2A6C",
            "E28011606000020E8CEC2A6E",
            "E28011606000020BB66E4522",
            "E28011606000020BB66E4521",
            "E28011606000020BB66E4520",
            "E28011606000020BB66E4526",
        ];

        $white_box = [
            "E28011606000020BB66E3C23",
            "E28011606000020E8CEC1B6F",
            "E28011606000020E8CEC3260",
            "E28011606000020E8CEC1B6D",
            "E28011606000020BB66E3C21",
            "E28011606000020E8CEC1B6E",
            "E28011606000020BB66E3C2A",
            "E28011606000020E8CEC3266",
            "E28011606000020E8CEC3265",
            "E28011606000020BB66E3C28",
            "E28011606000020E8CEC3264",
            "E28011606000020BB66E3C27",
            "E28011606000020E8CEC3262",
            "E28011606000020BB66E3C22",
            "E28011606000020BB66E3C29",
            "E28011606000020BB66E3C24",
            "E28011606000020E8CEC3261",
            "E28011606000020E8CEC3263",
            "E28011606000020BB66E3C25",
            "E28011606000020BB66E3C26",
        ];

        $green_bottle = [
            "E28011606000020BB66E3C2B",
            "E28011606000020E8CEC326F",
            "E28011606000020BB66E4D23",
            "E28011606000020BB66E4D22",
            "E28011606000020BB66E4D24",
            "E28011606000020BB66E4D21",
            "E28011606000020E8CEC326C",
            "E28011606000020E8CEC326D",
            "E28011606000020E8CEC326E",
            "E28011606000020E8CEC326B",
            "E28011606000020BB66E4D20",
            "E28011606000020BB66E3C2F",
            "E28011606000020E8CEC2360",
            "E28011606000020E8CEC3267",
            "E28011606000020E8CEC3268",
            "E28011606000020BB66E3C2C",
            "E28011606000020E8CEC3269",
            "E28011606000020BB66E3C2D",
            "E28011606000020BB66E3C2E",
            "E28011606000020E8CEC326A",
        ];

        $brown_bottle = [
            "E28011606000020BB66E4D26",
            "E28011606000020BB66E4D25",
            "E28011606000020E8CEC2362",
            "E28011606000020E8CEC2361",
            "E28011606000020E8CEC236A",
            "E28011606000020E8CEC2369",
            "E28011606000020BB66E4D2C",
            "E28011606000020BB66E4D2D",
            "E28011606000020BB66E4D2B",
            "E28011606000020E8CEC2365",
            "E28011606000020E8CEC2367",
            "E28011606000020E8CEC2366",
            "E28011606000020BB66E4D2A",
            "E28011606000020E8CEC2363",
            "E28011606000020BB66E4D27",
            "E28011606000020BB66E4D29",
            "E28011606000020E8CEC2368",
            "E28011606000020BB66E4D28",
            "E28011606000020E8CEC2364",
            "E28011606000020BB66E4D2E",
        ];

        $green_square_bottle = [
            "E28011606000020BB66E4428",
            "E28011606000020E8CEC236B",
            "E28011606000020E8CEC3A60",
            "E28011606000020BB66E4423",
            "E28011606000020E8CEC3A61",
            "E28011606000020BB66E4424",
            "E28011606000020E8CEC236C",
            "E28011606000020BB66E4420",
            "E28011606000020E8CEC236E",
            "E28011606000020BB66E4422",
            "E28011606000020BB66E4425",
            "E28011606000020BB66E4421",
            "E28011606000020E8CEC236D",
            "E28011606000020E8CEC3A64",
            "E28011606000020E8CEC3A62",
            "E28011606000020E8CEC236F",
            "E28011606000020BB66E4427",
            "E28011606000020E8CEC3A63",
            "E28011606000020BB66E4D2F",
            "E28011606000020BB66E4426",
        ];


        foreach ($products as $product){
            if(in_array($product->id,$shop_product)){
                if($product->id==1){
                    for ($i = 0; $i < $product->quantity; $i++) {
                        ShopProductInventory::create([
                            'shop_product_id'   => $product->id,
                            'rfid_code'         => $usb[$i],
                            'is_sold'           => 1,
                        ]);
                    }
                }else if($product->id==2){
                    for ($i = 0; $i < $product->quantity; $i++) {
                        ShopProductInventory::create([
                            'shop_product_id'   => $product->id,
                            'rfid_code'         => $brown_box[$i],
                            'is_sold'           => 1,
                        ]);
                    }
                }
                else if($product->id==3){
                    for ($i = 0; $i < $product->quantity; $i++) {
                        ShopProductInventory::create([
                            'shop_product_id'   => $product->id,
                            'rfid_code'         => $white_box[$i],
                            'is_sold'           => 1,
                        ]);
                    }
                }else if($product->id==4){
                    for ($i = 0; $i < $product->quantity; $i++) {
                        ShopProductInventory::create([
                            'shop_product_id'   => $product->id,
                            'rfid_code'         => $green_bottle[$i],
                            'is_sold'           => 1,
                        ]);
                    }
                }else if($product->id==5){
                    for ($i = 0; $i < $product->quantity; $i++) {
                        ShopProductInventory::create([
                            'shop_product_id'   => $product->id,
                            'rfid_code'         => $brown_bottle[$i],
                            'is_sold'           => 1,
                        ]);
                    }
                }else if($product->id==6){
                    for ($i = 0; $i < $product->quantity; $i++) {
                        ShopProductInventory::create([
                            'shop_product_id'   => $product->id,
                            'rfid_code'         => $green_square_bottle[$i],
                            'is_sold'           => 1,
                        ]);
                    }
                }


            }else{
                for ($i = 1; $i <= $product->quantity; $i++) {
                    ShopProductInventory::create([
                        'shop_product_id'   => $product->id,
                        'rfid_code'         => Str::random(16),
                        'is_sold'           => 1,
                    ]);
                }
            }
        }

    }
}
