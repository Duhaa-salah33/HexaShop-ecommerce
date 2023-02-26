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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->float('total_pay');
            $table->string('city');
            $table->string('address');
            $table->integer('phone');

            $table->integer('product_id');
            $table->string('product_title');
            $table->string('product_image');
            $table->string('product_price');
            $table->string('product_price_with_discount')->nullable();
            $table->string('product_quantity')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();

            $table->string('copoun')->nullable();
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('delivery_status')->default('in progress');
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
        Schema::dropIfExists('orders');
    }
};
