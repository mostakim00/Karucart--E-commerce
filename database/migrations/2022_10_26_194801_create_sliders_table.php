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
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('product_category');
            $table->integer('product_price');
            $table->integer('product_disPrice');
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('slug');
            $table->integer('status')->default(1)->comment('1. for Active 2. for Inactive');

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
        Schema::dropIfExists('sliders');
    }
};
