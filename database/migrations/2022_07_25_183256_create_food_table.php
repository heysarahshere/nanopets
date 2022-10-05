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
//        'type',
//        'description',
//        'mainStat', // hunger, magic, stamina, strength, defense, health, mojo
//        'bonusStat', // hunger, magic, stamina, strength, defense, health, mojo
//        'effectAmount', // amount effected by main
//        'bonusEffectAmount', // amount effected by bonus
//        'cost',
//        'owner_id',

            $table->integer('owner_id')->nullable();
            $table->string('name');
            $table->string('flavor')->default('sweet');
            $table->string('image');
            $table->string('type')->default("food"); // alternative would be potion - allows easy sorting
            $table->text('description');
            $table->string('mainStat')->default("hunger");
            $table->string('bonusStat')->default("stamina");
            $table->integer('effectAmount')->default(rand(0,55));
            $table->integer('bonusEffectAmount')->default(rand(0,25));

            $table->integer('cost')->default(1000);
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
