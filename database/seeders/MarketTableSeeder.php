<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Market;

class MarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $table->timestamps();
//        $table->string('name');
//        $table->string('image');
//        $table->text('description');
//        $table->string('mainStat')->default("hunger");
//        $table->string('type')->default("food"); // alternative would be potion - allows easy sorting
//        $table->bigInteger('cost')->default(1000);

        Market::create(
            [
                'name' => "Limey Twin Pop",
                'image' => "/images/foods/limetwin.png",
                'description' => "Bitter treat that boosts magic.",
                'mainStat' => "magic",
                'cost' => 2500,
                'type' => "food"
            ]
        );
        Market::create(
            [
                'name' => "Caramel Bar",
                'image' => "/images/foods/caramel.png",
                'description' => "Creamy treat to raise physical strength.",
                'mainStat' => "strength",
                'cost' => 2500,
                'type' => "food"
            ]
        );

        Market::create(
            [
                'name' => "Ice Cream Sandwich",
                'image' => "/images/foods/vanillasandwich.png",
                'description' => "Delicious frozen treat that increases health.",
                'mainStat' => "health",
                'cost' => 2000,
                'type' => "food",
            ]
        );
        Market::create(
            [
                'name' => "Meat-of-your-enemy Burger",
                'image' => "/images/foods/burger.png",
                'description' => "High-calorie meal to restore stamina and defenses.",
                'mainStat' => "magic",
                'cost' => 3000,
                'type' => "food"
            ]
        );
        Market::create(
            [
                'name' => "Mojo Pop",
                'image' => "/images/foods/mojopot.png",
                'description' => "Date night juice pop - made to share!",
                'mainStat' => "mojo",
                'cost' => 6000,
                'type' => "food"
            ]
        );

        Market::create(
            [
                'name' => "Mojo Potion",
                'image' => "/images/potions/mojopot.png",
                'description' => "Date night juice - small serving!",
                'mainStat' => "mojo",
                'cost' => 9000,
                'type' => "potion",
            ]
        );
    }
}
