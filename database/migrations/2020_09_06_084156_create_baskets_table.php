<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baskets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orderId')->unsigned();
            $table->bigInteger('productId')->unsigned();
<<<<<<< HEAD
            $table->string('productName');
            $table->integer('productPrice');
            $table->integer('productQuantity');
            $table->integer('productTotalPrice');
=======
            $table->dateTime('date');
            $table->bigInteger('quantity');
>>>>>>> 12c8afc7aa612484944f77c0d3aa54803ccc0e72
            $table->timestamps();
            $table->foreign('orderId')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baskets');
    }
}
