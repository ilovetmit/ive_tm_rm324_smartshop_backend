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
        Tag::findOrFail(9)->hasAdvertisement()->sync(1);
        Tag::findOrFail(9)->hasAdvertisement()->sync(2);
        Tag::findOrFail(9)->hasAdvertisement()->sync(3);
        Tag::findOrFail(9)->hasAdvertisement()->sync(4);
        Tag::findOrFail(9)->hasAdvertisement()->sync(5);
        Tag::findOrFail(9)->hasAdvertisement()->sync(6);
        Tag::findOrFail(9)->hasAdvertisement()->sync(7);
    }
}
