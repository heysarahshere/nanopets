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
        Schema::create('breed_tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('breed_start_time')->nullable();
            $table->timestamp('breed_end_time')->nullable();
            $table->integer('owner_id');
            $table->integer('male_id');
            $table->integer('female_id');
            $table->integer('progress')->default(0); // max 100 as this will be percent
            $table->integer('baby_id')->nullable();
            $table->boolean('open')->default(true);
            $table->boolean('started')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breed_tickets');
    }
};
