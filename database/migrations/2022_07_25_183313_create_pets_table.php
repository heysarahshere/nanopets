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
        Schema::create('pets', function (Blueprint $table) {
            $table->integer('owner_id');
            $table->string('name');
            $table->string('species', 500);
            $table->string('color_image', 500);
            $table->string('eye_image', 500);
            $table->string('tail_image', 500);
            $table->string('head_image', 500);
            $table->string('wing_image', 500);
            $table->string('element');
            $table->text('description');
            $table->integer('potential');
            $table->integer('health');
            $table->integer('stamina');
            $table->integer('mojo');
            $table->integer('magic');
            $table->integer('defense');
            $table->integer('strength');
            $table->integer('level');
            $table->integer('dev_stage');
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
        Schema::dropIfExists('pets');
    }
};
