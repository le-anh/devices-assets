<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->unsignedBigInteger('producttype_id');
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('ingredients')->nullable();
            $table->string('usage')->nullable();
            $table->string('storage')->nullable();
            $table->integer('period')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('producttype_id')->references('id')->on('product_types');
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
}
