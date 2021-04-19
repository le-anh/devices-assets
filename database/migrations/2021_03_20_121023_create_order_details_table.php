<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('productweight_id');
            $table->float('quantity', 8, 2)->default(1);
            $table->float('price', 8, 2)->default(0);
            $table->float('total', 8, 2)->default(0);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('productweight_id')->references('id')->on('product_weights');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
