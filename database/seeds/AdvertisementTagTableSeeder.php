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
        Tag::findOrFail(1)->hasAdvertisement()->sync(1);
        // Tag::findOrFail(2)->hasAdvertisement()->sync(1);
    }
}
