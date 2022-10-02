<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        // 'name',
        // 'species',
        // 'image',
        // 'description',
        // 'cost'
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housing_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('cost')->default(1000);
            $table->string('image');
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
        Schema::dropIfExists('housing_items');
    }
};
