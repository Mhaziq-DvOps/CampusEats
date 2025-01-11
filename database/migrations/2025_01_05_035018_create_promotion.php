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
        Schema::create('Promotion', function (Blueprint $table) {
            $table->bigIncrements('Promotion_Id');
            $table->string('Promo_Name');
            $table->string('Promo_Descr');
            $table->integer('Promo_Discount');
            $table->string('Promo_Status');
            $table->date('Promo_Start');
            $table->date('Promo_End');
            $table->bigInteger('Manager_id')->unsigned();
            $table->foreign('Manager_id')->references('Manager_id')->on('manager')->onDelete('cascade');
            $table->String('Promo_Image') -> nullable ();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Promotion');
    }
};
