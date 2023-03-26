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
        Schema::create('products', function (Blueprint $table) {
           $table->id();
            $table->integer('vendor_id');
            $table->string('product_code',80);
            $table->string('product_name',100);
            $table->string('product_slug');
            $table->bigInteger('product_price');
            $table->bigInteger('discount_price');
            $table->integer('quantity');
            $table->integer('cat_id');
            $table->integer('subcat_id');
            $table->string('thumbnails');
            $table->integer('status')->default(0)->comment('0 For Pending 1 Approved');
            $table->text('short_desc');
            $table->text('long_desc');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('products');
    }
};
