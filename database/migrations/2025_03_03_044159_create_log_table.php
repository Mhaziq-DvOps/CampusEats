<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
            $table->bigIncrements('Log_Id');
            $table->bigInteger('Cust_Id')->unsigned()->nullable();
            $table->bigInteger('Manager_Id')->unsigned()->nullable();
            $table->string('Log_Module');
            $table->string('Log_Pay_Type');
            $table->string('Log_Total_Price');
            $table->string('Log_Status');
            $table->foreign('Cust_Id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('Manager_Id')->references('Manager_id')->on('manager')
            ->onDelete('cascade');
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
        Schema::dropIfExists('log');
    }
}

