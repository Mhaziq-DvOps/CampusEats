<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBizHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_hour', function (Blueprint $table) {
            $table->bigIncrements('Day_Id');
            $table->string('Day_Of_Week');
            $table->time('Start_Time');
            $table->time('End_Time');
            $table->string('Status')->nullable();
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
        Schema::dropIfExists('business_hour');
    }
}
