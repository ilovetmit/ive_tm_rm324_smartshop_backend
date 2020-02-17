<?php

use Illuminate\Database\Seeder;
use App\Models\ProductManagement\AdvertismentManagement\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class,1)->create();
    }
}
