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
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('cost')->default(1000);
            $table->string('name');
            $table->string('image');
            $table->string('type')->default("food"); // alternative would be potion - allows easy sorting
            $table->text('description');
            $table->string('mainStat')->default("hunger");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markets');
    }
};
