<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->bigIncrements('Review_Id');
            $table->bigInteger('User_Id')->unsigned();
            $table->foreign('User_Id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('P_Id')->unsigned();
            $table->foreign('P_Id')->references('P_Id')->on('product')->onDelete('cascade');
            $table->integer('R_Rating');
            $table->string('R_Comment');
            $table->string('R_Image') ->nullable();;
            $table->string('R_Sentiment');
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
        Schema::dropIfExists('review');
    }
}

