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
                'flavor' => "savory",
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
                'name' => "Day Old Pizza",
                'flavor' => "savory",
                'image' => "/images/foods/pizza.png",
                'description' => "Greasy and cold, but provides a small stamina boost.",
                'mainStat' => "hunger",
                'effectAmount' => 40,
                'bonusStat' => "current_stamina",
                'bonusEffectAmount' => 150,
                'cost' => 400,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "Everything Hotdog",
                'flavor' => "savory",
                'image' => "/images/foods/hotdog.png",
                'description' => "There are too many toppings on this hotdog.",
                'mainStat' => "hunger",
                'effectAmount' => 30,
                'bonusStat' => "current_health",
                'bonusEffectAmount' => 15,
                'cost' => 400,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "Frosted Donut",
                'image' => "/images/foods/donut.png",
                'description' => "Sugar rush provides a large hunger boost, the crash later will be worth it.",
                'mainStat' => "hunger",
                'effectAmount' => 50,
                'bonusStat' => "current_stamina",
                'bonusEffectAmount' => -15,
                'cost' => 400,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "Fried Chicken",
                'flavor' => "savory",
                'image' => "/images/foods/chicken.png",
                'description' => "Heal up with this high-calorie food.",
                'mainStat' => "hunger",
                'effectAmount' => 50,
                'bonusStat' => "current_health",
                'bonusEffectAmount' => 15,
                'cost' => 500,
                'type' => "food",
            ]
        );

        Food::create(
            [
                'name' => "French Fry Side",
                'flavor' => "savory",
                'image' => "/images/foods/fries.png",
                'description' => "Very little nutritional value, but these fries provide energy.",
                'mainStat' => "hunger",
                'effectAmount' => 10,
                'bonusStat' => "current_stamina",
                'bonusEffectAmount' => 10,
                'cost' => 100,
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
                'image' => "/images/potions/health.png",
                'description' => "Restores health and provides a small but permanent increase",
                'mainStat' => "current_health",
                'effectAmount' => rand(300, 500),
                'bonusStat' => "max_health",
                'bonusEffectAmount' => rand(1, 5),
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
        Food::create(
            [
                'name' => "Fizzy Elixir",
                'image' => "/images/potions/magic.png",
                'description' => "Hmm, theres something strange about this.",
                'mainStat' => "magic",
                'effectAmount' => rand(99, 145),
                'cost' => 500,
                'type' => "potion",
            ]
        );
        Food::create(
            [
                'name' => "Strong Elixir",
                'image' => "/images/potions/strength.png",
                'description' => "Bitter, slimy drink - effects may vary.",
                'mainStat' => "strength",
                'effectAmount' => rand(99, 145),
                'cost' => 900,
                'type' => "potion",
            ]
        );
    }
}
