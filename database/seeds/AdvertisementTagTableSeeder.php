<?php

use Illuminate\Database\Seeder;
use App\Models\TagManagement\Tag;

class AdvertisementTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $tag = ['Soft Drink', 'Health', 'Juice', 'Tea', 'Trend', 'Homeware', 'Hot', 'Smart', 'On Sale', 'New'];

        Tag::findOrFail(9)->hasAdvertisement()->sync([1,4,5,6]);
        Tag::findOrFail(10)->hasAdvertisement()->sync([1,5,7,3]);

    }
}
