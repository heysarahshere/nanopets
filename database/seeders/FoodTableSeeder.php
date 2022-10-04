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

        // ---------------------- food
        // foods only effect hunger, stamina, or health. most should at least effect hunger
        Food::create(
            [
                'name' => "Stripey Icey",
                'image' => "/images/foods/stripeice.png",
                'description' => "Sour then sweet, refreshes a small amount of stamina.",
                'mainStat' => "hunger",
                'effectAmount' => 10,
                'bonusStat' => "current_stamina",
                'bonusEffectAmount' => 100,
                'cost' => 200,
                'type' => "food",
            ]
        );
        Food::create(
            [
                'name' => "Spilled Vanilla Ice Cream",
                'image' => "/images/foods/spilled_icecream.png",
                'description' => "Oops! Well, it's sweet and creamy.",
                'mainStat' => "hunger",
                'effectAmount' => 10,
                'cost' => 175,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "Limey Twin Pop",
                'image' => "/images/foods/limetwin.png",
                'description' => "Bitter treat that boosts health.",
                'mainStat' => "hunger",
                'effectAmount' => 10,
                'bonusStat' => "current_health",
                'bonusEffectAmount' => 100,
                'cost' => 250,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "Caramel Bar",
                'image' => "/images/foods/caramel.png",
                'description' => "Creamy caffeinated treat.",
                'mainStat' => "hunger",
                'effectAmount' => 10,
                'bonusStat' => "current_stamina",
                'bonusEffectAmount' => 100,
                'cost' => 250,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "Ice Cream Sandwich",
                'image' => "/images/foods/vanillasandwich.png",
                'description' => "Delicious frozen treat that increases health.",
                'mainStat' => "hunger",
                'effectAmount' => 15,
                'bonusStat' => "current_health",
                'bonusEffectAmount' => 100,
                'cost' => 200,
                'type' => "food",
            ]
        );
        Food::create(
            [
                'name' => "Meat-of-your-enemy Burger",
                'image' => "/images/foods/burger.png",
                'description' => "High-calorie meal to restore stamina.",
                'mainStat' => "hunger",
                'effectAmount' => 50,
                'bonusStat' => "current_stamina",
                'bonusEffectAmount' => 250,
                'cost' => 500,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "Mojo Pop",
                'image' => "/images/foods/mojo.png",
                'description' => "Date night juice pop - made to share!",
                'mainStat' => "hunger",
                'effectAmount' => 10,
                'bonusStat' => "mojo",
                'bonusEffectAmount' => 100,
                'cost' => 400,
                'type' => "food",
            ]
        );

        // ---------------------- potions

        Food::create(
            [
                'name' => "Defense Potion",
                'image' => "/images/potions/defense.png",
                'description' => "Tough as nails - tastes metallic!",
                'mainStat' => "defense",
                'effectAmount' => rand(300, 500),
                'bonusStat' => "strength",
                'bonusEffectAmount' => rand(200, 300),
                'cost' => 1000,
                'type' => "potion",
            ]
        );

        Food::create(
            [
                'name' => "Health Potion",
                'image' => "/images/potions/stamina.png",
                'description' => "A nap in a bottle!",
                'mainStat' => "stamina",
                'effectAmount' => rand(300, 500),
                'cost' => 500,
                'type' => "potion",
            ]
        );

        Food::create(
            [
                'name' => "Stamina Potion",
                'image' => "/images/potions/stamina.png",
                'description' => "A nap in a bottle!",
                'mainStat' => "stamina",
                'effectAmount' => rand(300, 500),
                'cost' => 500,
                'type' => "potion",
            ]
        );

        Food::create(
            [
                'name' => "Mojo Potion",
                'image' => "/images/potions/mojo.png",
                'description' => "Date night juice - small serving!",
                'mainStat' => "mojo",
                'effectAmount' => rand(99, 145),
                'cost' => 900,
                'type' => "potion",
            ]
        );
    }
}
