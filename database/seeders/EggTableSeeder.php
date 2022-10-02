<?php

namespace Database\Seeders;

use App\Models\Egg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EggTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dark
        Egg::create([
            'name' => "Shadow Egg",
            'element' => "dark",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 10000,
        ]);

        // water
        Egg::create([
            'name' => "Oceanic Egg",
            'element' => "water",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 1500,
        ]);

        // lava
        Egg::create([
            'name' => "Molten Egg",
            'element' => "lava",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 3000,
        ]);

        // lightning
        Egg::create([
            'name' => "Charged Egg",
            'element' => "lightning",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 3000,
        ]);

        // ice
        Egg::create([
            'name' => "Tundra Egg",
            'element' => "ice",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 3000,
        ]);

        // air
        Egg::create([
            'name' => "Temple Egg",
            'element' => "air",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 3500,
        ]);

        // earth
        Egg::create([
            'name' => "Mountain Egg",
            'element' => "earth",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 3500,
        ]);

        // fire
        Egg::create([
            'name' => "Desert Egg",
            'element' => "fire",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 1000,
        ]);

        // celestial
        Egg::create([
            'name' => "Galactic Egg",
            'element' => "celestial",
            'description' => "Radioactive egg found on an asteroid. Very mysterious.",
            'cost' => 10000,
        ]);

        //gem
        Egg::create([
            'name' => "Crystal Egg",
            'element' => "gem",
            'description' => "Is it really an egg, or is it just a cool gem? Who knows.",
            'cost' => 5000,
        ]);
    }
}
