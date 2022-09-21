<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetTableSeeder extends Seeder
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
        Pet::create(
            [
                'name'=>'skritskrat',
                'species'=>'dragon',
                'color_image'=>'galaxy.png',
                'eye_image'=>'blue.png',
                'tail_image'=>'demon_green.png',
                'head_image'=>'horns_long.png',
                'wing_image'=>'dragonfly_blue.png',
                'element'=>'fire',
                'description'=>'skritskrat',
                'potential'=>rand(10, 50),
                'health'=>rand(250, 3000),
                'stamina'=>rand(250, 1500),
                'mojo'=>rand(10, 50),
                'magic'=>rand(250, 2000),
                'strength'=>rand(250, 2000),
                'defense'=>rand(250, 1000),
                'level'=>rand(1, 30),
                'dev_stage' => 3,
                'owner_id'=>1,
            ]
        );


        Pet::create(
            [
                'name'=>'Gadget',
                'species'=>'lizard',
                'color_image'=>'ghost.png',
                'eye_image'=>'red.png',
                'tail_image'=>'fish.png',
                'head_image'=>'horns_unicorn.png',
                'wing_image'=>'fairy_teal.png',
                'element'=>'fire',
                'description'=>'skritskrat',
                'potential'=>rand(10, 50),
                'health'=>rand(250, 3000),
                'stamina'=>rand(250, 1500),
                'mojo'=>rand(10, 50),
                'magic'=>rand(250, 2000),
                'strength'=>rand(250, 2000),
                'defense'=>rand(250, 1000),
                'level'=>rand(1, 30),
                'dev_stage' => 3,
                'owner_id'=>1,
            ]
        );
    }
}
