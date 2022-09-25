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
        // 'owner_id',

//        $table->integer('potential');
//        $table->integer('health');
//        $table->integer('stamina');
//        $table->integer('mojo');
//        $table->integer('magic');
//        $table->integer('defense');
//        $table->integer('strength');
//        $table->integer('level');
        Creature::create(
            [
                'name'=>'skritskrat',
                'species'=>'dragon',
                'body_image'=>'1.png',
                'eye_image'=>'2.png',
                'tail_image'=>'demon_green.png',
                'head_image'=>'horns_long.png',
                'wing_image'=>'dragonfly_blue.png',
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
                'dev_stage' => 3,
                'owner_id'=>1,
            ]
        );

        Creature::create(
            [
                'name'=>'Chicken',
                'species'=>'bird',
                'body_image'=>'5.png',
                'tail_image'=>'demon_green.png',
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
                'dev_stage' => 3,
                'owner_id'=>1,
            ]
        );

        Creature::create(
            [
                'name'=>'Gadget',
                'species'=>'lizard',
                'body_image'=>'2.png',
                'tail_image'=>'fish.png',
                'head_image'=>'horns_unicorn.png',
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
                'dev_stage' => 3,
                'owner_id'=>1,
            ]
        );

        Creature::create([
            'name' => "Desert Egg",
            'body_image' => "/images/eggs/desert.png",
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
            'dev_stage' => 1,
        ]);

        Creature::create([
            'name' => "Galaxy Egg",
            'body_image' => "/images/eggs/galaxy.png",
            'element' => "star",
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
            'dev_stage' => 1,
        ]);

        Creature::create([
            'name' => "Gem Egg",
            'body_image' => "/images/eggs/gem.png",
            'element' => "rock",
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
            'dev_stage' => 1,
        ]);
    }
}
