<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Creature;

class CreatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // 'name',
        // 'species',
        // 'tier',
        // 'color_image',
        // 'eye_image',
        // 'tail_image',
        // 'head_image',
        // 'wing_image',
        // 'element',
        // 'description',
        // 'potential',
        // 'health',
        // 'stamina',
        // 'mojo',
        // 'magic',
        // 'strength',
        // 'defense',
        // 'level',
        // dev_stage -- egg, hatchling, baby, or adult
        // 'owner_id',

// tiers:
//        bronze, silver, gold, platinum, diamond

        // --------------------- owned by admin
        Creature::create(
            [
                'name'=>'skritskrat',
                'species'=>'dragon',
                'element'=>'fire',
                'description'=>'skritskrat',
                'potential'=>rand(10, 50),
                'max_health'=> 3000,
                'current_health'=>rand(250, 3000),
                'max_stamina'=> 1500,
                'current_stamina'=>rand(250, 1500),
                'hunger'=>rand(25, 100),
                'mojo'=>rand(10, 50),
                'magic'=>rand(250, 2000),
                'strength'=>rand(250, 2000),
                'defense'=>rand(250, 1000),
                'level'=>rand(1, 30),
                'dev_stage' => "baby",
                'owner_id'=>1,
            ]
        );

        Creature::create(
            [
                'name'=>'Chicken',
                'species'=>'horse',
                'element'=>'dark',
                'gender' => "male",
                'description'=>'skritskrat',
                'potential'=>rand(10, 50),
                'max_health'=> 3000,
                'current_health'=>rand(250, 3000),
                'max_stamina'=> 1500,
                'current_stamina'=>rand(250, 1500),
                'hunger'=>rand(25, 100),
                'mojo'=>rand(10, 50),
                'magic'=>rand(250, 2000),
                'strength'=>rand(250, 2000),
                'defense'=>rand(250, 1000),
                'level'=>rand(1, 30),
                'dev_stage' => "baby",
                'owner_id'=>1,
            ]
        );

        Creature::create(
            [
                'name'=>'Gadget',
                'species'=>'lizard',
                'element'=>'water',
                'description'=>'skritskrat',
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
                'level'=>rand(1, 30),
                'dev_stage' => "baby",
                'owner_id'=>1,
            ]
        );

        // --------------------- for sale on adopt page

        // dark
        Creature::create([
            'name' => "Shadow",
            'element' => "dark",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
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
            'level'=>rand(1, 30),
            'cost' => rand(2500, 10000),
            'dev_stage' => "baby",
            'for_sale' => true
        ]);

        // water
        Creature::create([
            'name' => "Oceanic",
            'element' => "water",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
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
            'level'=>rand(1, 30),
            'cost' => rand(2500, 10000),
            'dev_stage' => "adult",
            'for_sale' => true
        ]);

        // lava
        Creature::create([
            'name' => "Molten",
            'element' => "lava",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
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
            'level'=>rand(1, 30),
            'cost' => rand(2500, 10000),
            'dev_stage' => "baby",
            'for_sale' => true
        ]);

        // lightning
        Creature::create([
            'name' => "Charged",
            'element' => "lightning",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
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
            'level'=>rand(1, 30),
            'cost' => rand(2500, 10000),
            'dev_stage' => "adult",
            'for_sale' => true
        ]);

        // ice
        Creature::create([
            'name' => "Tundra",
            'element' => "ice",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'species'=>'cat',
            'gender'=>'male',
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
            'level'=>rand(1, 30),
            'cost' => rand(2500, 10000),
            'dev_stage' => "baby",
            'for_sale' => true
        ]);

        // air
        Creature::create([
            'name' => "Temple",
            'element' => "air",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
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
            'level'=>rand(1, 30),
            'cost' => rand(2500, 10000),
            'dev_stage' => "baby",
            'for_sale' => true
        ]);

        // earth
        Creature::create([
            'name' => "Mountain",
            'element' => "earth",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'species'=>'lizard',
            'gender'=>'male',
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
            'level'=>rand(1, 30),
            'cost' => rand(2500, 10000),
            'dev_stage' => "baby",
            'for_sale' => true
        ]);

        // fire
        Creature::create([
            'name' => "Desert",
            'element' => "fire",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
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
            'level'=>rand(1, 30),
            'cost' => rand(2500, 10000),
            'dev_stage' => "adult",
            'for_sale' => true
        ]);

        // celestial
        Creature::create([
            'name' => "Galactic",
            'tier' => "Gold",
            'element' => "celestial",
            'gender' => "male",
            'description' => "Radioactive creature found on an asteroid. Very mysterious.",
            'species'=>'cat',
            'potential'=>rand(40, 70),
            'max_health'=> 4000,
            'current_health'=>rand(2500, 4000),
            'max_stamina'=> 1700,
            'current_stamina'=>rand(250, 1700),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(1000, 3000),
            'strength'=>rand(1000, 3000),
            'defense'=>rand(1000, 3000),
            'level'=>rand(20, 30),
            'cost' => rand(9000, 13000),
            'dev_stage' => "adult",
            'for_sale' => true
        ]);

        //gem
        Creature::create([
            'name' => "Crystal",
            'element' => "gem",
            'gender' => "male",
            'description' => "Shiny.",
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
            'level'=>rand(1, 30),
            'cost' => rand(2500, 10000),
            'dev_stage' => "baby",
            'for_sale' => true
        ]);

        Creature::create(
            [
                'name'=>'Gizmo',
                'tier'=>'Gold',
                'species'=>'dragon',
                'element'=>'lava',
                'gender'=>'male',
                'description'=>'beefy boy',
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
                'level'=>rand(1, 30),
                'dev_stage' => "adult",
                'for_sale' => true,
                'cost' => 1000
            ]
        );
        Creature::create(
            [
                'name'=>'Oppa',
                'tier'=>'Gold',
                'species'=>'lizard',
                'element'=>'lightning',
                'description'=>'zap zap',
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
                'level'=>rand(1, 30),
                'dev_stage' => "adult",
                'for_sale' => true,
                'cost' => 2000
            ]
        );

    }
}
