<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->bigInteger('Order_Id')->unsigned();
            $table->foreign('Order_Id')->references('id')->on('customer_order')->onDelete('cascade');
            $table->bigInteger('P_Id')->unsigned();
            $table->foreign('P_Id')->references('P_Id')->on('product')->onDelete('cascade');
            $table->bigInteger('Order_Quantity');
            $table->double('Order_Price');
            $table->boolean('rstatus')->default(false);
            $table->timestamps();
            $table->primary(['Order_Id', 'P_Id']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}

