<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id');
            $table->unsignedBigInteger('productweight_id');
            $table->float('quantity', 8, 2)->default(1);
            $table->float('price', 8, 2)->default(0);
            $table->float('total', 8, 2)->default(0);
            $table->timestamps();

            $table->foreign('bill_id')->references('id')->on('bills');
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
        Schema::dropIfExists('bill_details');
    }
}
