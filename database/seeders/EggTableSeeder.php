<?php

namespace Database\Seeders;

use App\Models\Creature;
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
        Creature::create([
            'name' => "Shadow Egg",
            'element' => "dark",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 10000,
            'tier'=>'Silver',
            'species'=>'horse',
            'potential'=>rand(10, 50),
            'max_health'=> 2000,
            'current_health'=>rand(250, 2000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 5),
            'dev_stage' => "egg",
            'for_sale' => true,
            'seller_id' => 1
        ]);

        // water
        Creature::create([
            'name' => "Oceanic Egg",
            'element' => "water",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 1500,
            'tier'=>'Bronze',
            'species'=>'lizard',
            'potential'=>rand(10, 50),
            'max_health'=> 2000,
            'current_health'=>rand(250, 2000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 5),
            'dev_stage' => "egg",
            'for_sale' => true,
            'seller_id' => 1
        ]);

        // lava
        Creature::create([
            'name' => "Molten Egg",
            'element' => "lava",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 3000,
            'tier'=>'Silver',
            'species'=>'horse',
            'potential'=>rand(10, 50),
            'max_health'=> 2000,
            'current_health'=>rand(250, 2000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 5),
            'dev_stage' => "egg",
            'for_sale' => true,
            'seller_id' => 1
        ]);

        // lightning
        Creature::create([
            'name' => "Charged Egg",
            'element' => "lightning",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 3000,
            'tier'=>'Silver',
            'species'=>'cat',
            'potential'=>rand(10, 50),
            'max_health'=> 2000,
            'current_health'=>rand(250, 2000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 5),
            'dev_stage' => "egg",
            'for_sale' => true,
            'seller_id' => 1
        ]);

        // ice
        Creature::create([
            'name' => "Tundra Egg",
            'element' => "ice",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 3000,
            'tier'=>'Silver',
            'species'=>'cat',
            'potential'=>rand(10, 50),
            'max_health'=> 2000,
            'current_health'=>rand(250, 2000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 5),
            'dev_stage' => "egg",
            'for_sale' => true,
            'seller_id' => 1
        ]);

        // air
        Creature::create([
            'name' => "Temple Egg",
            'element' => "air",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 3500,
            'tier'=>'Gold',
            'species'=>'dragon',
            'potential'=>rand(10, 50),
            'max_health'=> 2000,
            'current_health'=>rand(250, 2000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 5),
            'dev_stage' => "egg",
            'for_sale' => true,
            'seller_id' => 1
        ]);

        // earth
        Creature::create([
            'name' => "Mountain Egg",
            'element' => "earth",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 3500,
            'tier'=>'Silver',
            'species'=>'dragon',
            'potential'=>rand(10, 50),
            'max_health'=> 2000,
            'current_health'=>rand(250, 2000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 5),
            'dev_stage' => "egg",
            'for_sale' => true,
            'seller_id' => 1
        ]);

        // fire
        Creature::create([
            'name' => "Desert Egg",
            'element' => "fire",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'cost' => 1000,
            'tier'=>'bronze',
            'species'=>'lizard',
            'potential'=>rand(10, 50),
            'max_health'=> 2000,
            'current_health'=>rand(250, 2000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 5),
            'dev_stage' => "egg",
            'for_sale' => true,
            'seller_id' => 1
        ]);

        // celestial
        Creature::create([
            'name' => "Galactic Egg",
            'element' => "celestial",
            'description' => "Radioactive egg found on an asteroid. Very mysterious.",
            'cost' => 10000,
            'tier'=>'Platinum',
            'species'=>'cat',
            'potential'=>rand(10, 50),
            'max_health'=> 2000,
            'current_health'=>rand(250, 2000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 5),
            'dev_stage' => "egg",
            'for_sale' => true,
            'seller_id' => 1
        ]);

        //gem
        Creature::create([
            'name' => "Crystal Egg",
            'element' => "gem",
            'description' => "Is it really an egg, or is it just a cool gem? Who knows.",
            'cost' => 5000,
            'tier'=>'Silver',
            'species'=>'horse',
            'potential'=>rand(10, 50),
            'max_health'=> 2000,
            'current_health'=>rand(250, 2000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 5),
            'dev_stage' => "egg",
            'for_sale' => true,
            'seller_id' => 1
        ]);
    }
}
