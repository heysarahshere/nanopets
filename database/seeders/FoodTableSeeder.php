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
                'effectAmount' => rand(100, 260),
                'cost' => 2500,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "Caramel Bar",
                'image' => "/images/foods/caramel.png",
                'description' => "Creamy treat to raise physical strength.",
                'mainStat' => "strength",
                'effectAmount' => rand(100, 260),
                'cost' => 2500,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "Ice Cream Sandwich",
                'image' => "/images/foods/vanillasandwich.png",
                'description' => "Delicious frozen treat that increases health.",
                'mainStat' => "health",
                'effectAmount' => rand(10, 20),
                'cost' => 2000,
                'type' => "food",
            ]
        );
        Food::create(
            [
                'name' => "Meat-of-your-enemy Burger",
                'image' => "/images/foods/burger.png",
                'description' => "High-calorie meal to restore stamina and defenses.",
                'mainStat' => "magic",
                'effectAmount' => rand(65, 160),
                'cost' => 3000,
                'type' => "food",
            ]
        );
        Food::create(
            [
                'name' => "Mojo Pop",
                'image' => "/images/foods/mojo.png",
                'description' => "Date night juice pop - made to share!",
                'mainStat' => "mojo",
                'effectAmount' => rand(50, 145),
                'cost' => 6000,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "Mojo Potion",
                'image' => "/images/potions/mojo.png",
                'description' => "Date night juice - small serving!",
                'mainStat' => "mojo",
                'effectAmount' => rand(99, 145),
                'cost' => 9000,
                'type' => "potion",
            ]
        );
    }
}
