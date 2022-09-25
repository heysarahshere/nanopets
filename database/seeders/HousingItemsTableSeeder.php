<?php

namespace Database\Seeders;

use App\Models\HousingItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HousingItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HousingItem::create(
            [
                'name' => "charel",
                'image' => "/images/housingitems/chair.png",
                'description' => "charel",
                'cost' => 1000,
            ]
        );
    }
}
