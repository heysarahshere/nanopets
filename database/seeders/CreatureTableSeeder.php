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

//        $table->integer('potential');
//        $table->integer('health');
//        $table->integer('stamina');
//        $table->integer('mojo');
//        $table->integer('magic');
//        $table->integer('defense');
//        $table->integer('strength');
//        $table->integer('level');

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

        // --------------------- eggs

        // dark
        Creature::create([
            'name' => "Shadow Egg",
            'element' => "dark",
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
            'dev_stage' => "egg",
        ]);

        // water
        Creature::create([
            'name' => "Oceanic Egg",
            'element' => "water",
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
            'dev_stage' => "egg",
        ]);

        // lava
        Creature::create([
            'name' => "Molten Egg",
            'element' => "lava",
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
            'dev_stage' => "egg",
        ]);

        // lightning
        Creature::create([
            'name' => "Charged Egg",
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
            'dev_stage' => "egg",
        ]);

        // ice
        Creature::create([
            'name' => "Tundra Egg",
            'element' => "ice",
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
            'dev_stage' => "egg",
        ]);

        // air
        Creature::create([
            'name' => "Temple Egg",
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
            'dev_stage' => "egg",
        ]);

        // earth
        Creature::create([
            'name' => "Mountain Egg",
            'element' => "earth",
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
            'dev_stage' => "egg",
        ]);

        // fire
        Creature::create([
            'name' => "Desert Egg",
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
            'dev_stage' => "egg",
        ]);

        // celestial
        Creature::create([
            'name' => "Galactic Egg",
            'element' => "celestial",
            'gender' => "male",
            'description' => "Radioactive egg found on an asteroid. Very mysterious.",
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
            'dev_stage' => "egg",
        ]);

        //gem
        Creature::create([
            'name' => "Crystal Egg",
            'element' => "gem",
            'gender' => "male",
            'description' => "Is it really an egg, or is it just a cool gem? Who knows.",
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
            'dev_stage' => "egg",
        ]);

        // --------------------- for sale on adopt page
        Creature::create(
            [
                'name'=>'Gizmo',
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
            ]
        );
        Creature::create(
            [
                'name'=>'Oppa',
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
            ]
        );

    }
}
