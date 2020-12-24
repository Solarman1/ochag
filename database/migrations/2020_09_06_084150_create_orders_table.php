<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('customerName');
            $table->string('customerPhone');
            $table->string('customerEmail');
            $table->string('customerAdres');
            $table->string('deliveryTime'); 
            $table->integer('paymentType');
            $table->integer('personsCount')->nullable();
            $table->integer('sdacha')->nullable();
            $table->text('description')->nullable();
            $table->integer('totalPrice');
            $table->timestamps();
           // $table->foreign('basketId')->references('id')->on('baskets')->onUpdate('cascade')->onDelete('cascade');
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
}
