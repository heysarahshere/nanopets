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

//        $table->string('name');
//        $table->string('element');
//        $table->text('description');
//        $table->string('name');
//        $table->integer('potential')->default(0); // scale 0-10
//        $table->integer('health')->default(0); // scale 0-9999
//        $table->integer('stamina')->default(0); // scale 0-1500
//        $table->integer('mojo')->default(0); // scale 0-5000
//        $table->integer('magic')->default(0); // scale 0-9999
//        $table->integer('defense')->default(0); // scale 0-9999
//        $table->integer('strength')->default(0); // scale 0-9999
//        $table->integer('hatchSpeed')->default(1); // scale 0-5

    public function run()
    {
        Egg::create([
            'name' => "Desert Egg",
            'image' => "/images/eggs/desert.png",
            'element' => "fire",
            'description' => "Durable egg found on the surfaces of scorching deserts, guarded by dragon-like creatures.",
            'potential' => rand(0,8),
            'health' => rand(15, 67),
            'stamina' => rand(15, 500),
            'mojo' => rand(0, 50),
            'magic' => rand(15, 500),
            'defense' => rand(15, 500),
            'strength' => rand(15, 500),
            'hatchSpeed' => rand(1,5),
            'cost' => 55500
        ]);

        Egg::create([
            'name' => "Galaxy Egg",
            'image' => "/images/eggs/galaxy.png",
            'element' => "star",
            'description' => "Radioactive egg found on an asteroid. Very mysterious.",
            'potential' => rand(0,8),
            'health' => rand(15, 67),
            'stamina' => rand(15, 500),
            'mojo' => rand(0, 50),
            'magic' => rand(15, 500),
            'defense' => rand(15, 500),
            'strength' => rand(15, 500),
            'hatchSpeed' => rand(1,5),
            'cost' => 60500
        ]);

        Egg::create([
            'name' => "Gem Egg",
            'image' => "/images/eggs/gem.png",
            'element' => "rock",
            'description' => "Is it really an egg, or is it just a cool gem? Who knows.",
            'potential' => rand(0,8),
            'health' => rand(15, 67),
            'stamina' => rand(15, 500),
            'mojo' => rand(0, 50),
            'magic' => rand(15, 500),
            'defense' => rand(15, 500),
            'strength' => rand(15, 500),
            'hatchSpeed' => rand(1,5),
            'cost' => 10500
        ]);
    }
}
