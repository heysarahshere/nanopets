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
            $table->integer('owner_id')->nullable();
            $table->string('name');
            $table->string('tier')->default("Bronze");
            $table->string('species');
            $table->string('gender')->default("female");
            $table->string('element');
            $table->text('description');
            $table->integer('potential')->default(1);
            $table->integer('max_health')->default(1);
            $table->integer('health')->default(1);
            $table->integer('max_stamina')->default(1);
            $table->integer('stamina')->default(1);
            $table->integer('hunger')->default(100);
            $table->integer('mojo')->default(1);
            $table->integer('magic')->default(1);
            $table->integer('defense')->default(1);
            $table->integer('strength')->default(1);
            $table->integer('level')->default(1);
            $table->string('dev_stage')->default("egg"); // 1 = egg, 2 = baby, 3 = adult
            $table->integer('cost')->nullable();
            $table->boolean('for_sale')->default(false);
            $table->integer('seller_id')->nullable();
            $table->boolean('available')->default(true);
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
