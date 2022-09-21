<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Food::create(
            [
                'name' => "Limey Twin Pop",
                'image' => "/images/foods/limetwin.png",
                'description' => "Bitter treat that boosts magic.",
                'mainStat' => "magic",
                'magic' => rand(100, 260),
                'cost' => 2500,
                'type' => "food"
            ]
        );

        Food::create(
            [
                'name' => "Caramel Bar",
                'image' => "/images/foods/caramel.png",
                'description' => "Creamy treat to raise physical strength.",
                'mainStat' => "strength",
                'strength' => rand(100, 260),
                'cost' => 2500,
                'type' => "food"
            ]
        );

        Food::create(
            [
                'name' => "Ice Cream Sandwich",
                'image' => "/images/foods/vanillasandwich.png",
                'description' => "Delicious frozen treat that increases health.",
                'mainStat' => "health",
                'defense' => rand(10, 20),
                'health' => rand(100, 155),
                'cost' => 2000,
                'type' => "food"
            ]
        );
        Food::create(
            [
                'name' => "Meat-of-your-enemy Burger",
                'image' => "/images/foods/burger.png",
                'description' => "High-calorie meal to restore stamina and defenses.",
                'mainStat' => "magic",
                'defense' => rand(65, 160),
                'stamina' => rand(25, 50),
                'cost' => 3000,
                'type' => "food"
            ]
        );
        Food::create(
            [
                'name' => "Mojo Pop",
                'image' => "/images/foods/mojopot.png",
                'description' => "Date night juice pop - made to share!",
                'mainStat' => "mojo",
                'mojo' => rand(50, 145),
                'breedableStatChance' => rand(50, 90),
                'breedableStat' => "health",
                'cost' => 6000,
                'type' => "food"
            ]
        );

        Food::create(
            [
                'name' => "Mojo Potion",
                'image' => "/images/potions/mojopot.png",
                'description' => "Date night juice - small serving!",
                'mainStat' => "mojo",
                'mojo' => rand(99, 145),
                'breedableStatChance' => rand(300, 900),
                'breedableStat' => "magic",
                'cost' => 9000,
                'type' => "potion"
            ]
        );
    }
}
