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
        Schema::create('Payment_type', function (Blueprint $table) {
            $table->bigIncrements('PM_Id');
            $table->string('Name');
            $table->integer('Status')->default('1');
            $table->binary('Image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Payment_type');
    }
};
