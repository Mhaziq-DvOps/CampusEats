<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateShop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->bigIncrements('Shop_Id');
            $table->string('S_Category');
            $table->foreign('S_Category')->references('S_Cat_Name')->on('shop_category')->onDelete('cascade');
            $table->string('S_Name');
            $table->string('S_Description');
            $table->integer('Dine_In')->nullable();
            $table->integer('Delivery')->nullable();
            $table->integer('Pick_Up')->nullable();
            $table->integer('Booking')->nullable();
            $table->string('S_Status')->nullable();
            $table->string('S_Reason')->nullable();
            $table->string('S_Termcond')->nullable();
            $table->string('S_Image')->nullable();
            $table->string('S_Banner')->nullable();
            $table->string('S_Table')->nullable();
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
        Schema::dropIfExists('shop');
    }
}

