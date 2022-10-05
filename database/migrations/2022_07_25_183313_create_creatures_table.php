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
        Schema::create('creatures', function (Blueprint $table) {
            // general info
            $table->integer('owner_id')->nullable();
            $table->string('name');
            $table->string('species');
            $table->integer('level')->default(1);
            $table->string('element');
            $table->string('tier')->default("Bronze");
            $table->string('gender')->default("female");

            // for leveling, games, etc
            $table->integer('hunger')->default(100);
            $table->integer('mojo')->default(1);
            $table->integer('magic')->default(1);
            $table->integer('defense')->default(1);
            $table->integer('strength')->default(1);
            $table->integer('max_health')->default(1);
            $table->integer('current_health')->default(1);
            $table->integer('max_stamina')->default(1);
            $table->integer('current_stamina')->default(1);
            // should update to be "age"
            $table->string('dev_stage')->default("egg"); // 1 = egg, 2 = baby, 3 = adult

            // needed for sales
            $table->integer('cost')->nullable();
            $table->boolean('for_sale')->default(false);
            $table->integer('seller_id')->nullable();
            $table->text('description');

            // breeding
            $table->boolean('available')->default(true);
            $table->timestamp('last_bred')->nullable();
            $table->integer('potential')->default(1);

            // for eggs/hatchlings
            $table->boolean('is_incubating')->default(false);
            $table->integer('temperature')->default(30); // max 100
            $table->integer('progress')->default(0); // percentage until hatched (becomes hatchling around 90%) - max 100
            $table->timestamp('hatched')->nullable();
            $table->timestamp('out_of_incubator_since')->nullable(); // so we know when the egg has been out of incubation too long

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
        Schema::dropIfExists('creatures');
    }
};
