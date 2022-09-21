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
        Schema::create('eggs', function (Blueprint $table) {
            $table->integer('owner_id')->nullable();
            $table->string('name');
            $table->string('image', 500)->default('empty_cat.png');
            $table->string('element');
            $table->text('description');
            $table->integer('potential')->default(0); // scale 0-10
            $table->integer('health')->default(10); // scale 0-9999
            $table->integer('stamina')->default(5); // scale 0-1500
            $table->integer('mojo')->default(0); // scale 0-5000
            $table->integer('magic')->default(0); // scale 0-9999
            $table->integer('defense')->default(5); // scale 0-9999
            $table->integer('strength')->default(5); // scale 0-9999
            $table->integer('hatchSpeed')->default(1); // scale 0-5
            $table->bigInteger('cost')->default(10000);
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
        Schema::dropIfExists('eggs');
    }
};
