<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant_table', function (Blueprint $table) {
            $table->bigIncrements('T_Id');
            $table->bigInteger('Shop_Id')->unsigned();
            $table->foreign('Shop_Id')->references('Shop_Id')->on('shop')
            ->onDelete('cascade');
            $table->integer('T_Pax');
            $table->string('T_Status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_table');
    }
};
