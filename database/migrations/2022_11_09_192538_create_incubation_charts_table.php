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
        Schema::create('incubation_charts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // taken from creatures - can be brought into its own table
            // for eggs/hatchlings
            $table->bigInteger('creature_id'); // max 100
            $table->boolean('is_incubating')->default(false);
            $table->integer('temperature')->default(30); // max 100
            $table->integer('progress')->default(0); // percentage until hatched (becomes hatchling around 90%) - max 100
            $table->timestamp('out_of_incubator_since')->nullable(); // so we know when the egg has been out of incubation too long

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incubation_charts');
    }
};
