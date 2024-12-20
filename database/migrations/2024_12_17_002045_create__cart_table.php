<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Pro_Id');
            $table->foreign('Pro_Id')->references('P_Id')->on('product')->onDelete('cascade');
            $table->unsignedBigInteger('Cust_Id');
            $table->foreign('Cust_Id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('Pro_Qty');
            $table->string('Order_Type')->nullable();
            $table->string('BookDate')->nullable();
            $table->string('BookTime')->nullable();
            $table->string('BookPax')->nullable();
            $table->string('BookTable')->nullable();
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
        Schema::dropIfExists('cart');
    }
}
