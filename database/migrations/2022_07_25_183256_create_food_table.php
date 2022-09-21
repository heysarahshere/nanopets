<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {

// Food model attributes:
//        'name',
//        'image',
//        'description',
//        'mainStat', // main stat effected by the food
//        'hunger', // bar that must stay full stamina & health won't recharge
//        'magic', // magical damage
//        'stamina', // energy used to cast or attack
//        'strength', // physical damage
//        'defense', // damage resistance
//        'health', // life points
//        'mojo', // breeding success chance
//        'breedableStat', // STRING: stat this food will effect when breeding
//        'breedableStatChance', // INT: % chance of the breedableStat being closer to the higher parent's stat
//        'cost'

            $table->integer('owner_id')->nullable();
            $table->string('name');
            $table->string('image');
            $table->string('type')->default("food"); // alternative would be potion - allows easy sorting
            $table->text('description');
            $table->string('mainStat')->default("hunger");

            // when creating a food,
            // can leave any/all default-able field empty for random low-level effect.
            $table->integer('hunger')->default(rand(0,15));
            $table->integer('magic')->default(rand(0,5));
            $table->integer('stamina')->default(rand(0,10));
            $table->integer('strength')->default(rand(0,5));
            $table->integer('defense')->default(rand(0,10));
            $table->integer('health')->default(rand(0,10));
            $table->integer('mojo')->default(rand(0,5));

            // breedable stat/stat chance only needed for potions made for breeding -
            // can leave null for regular food
            $table->string('breedableStat')->nullable();
            $table->integer('breedableStatChance')->nullable();

            $table->bigInteger('cost')->default(1000);
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
};
