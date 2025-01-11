<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('password');
            $table->boolean('isBanned')  ->default(0);
            $table->string('occupation') ->nullable();
            $table->string('marital') ->nullable();
            $table->string('gender') ->nullable();
            $table->string('race') ->nullable();
            $table->date('birthdate')->nullable();
            $table->string('email');
            $table->string('street_1')->nullable();
            $table->integer('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->timestamp('Email_Verified_At')->nullable();
            $table->string('reason')->nullable();
            $table->string('profilepicture')->nullable();
            $table->rememberToken();
            $table->timestamps();

            //$table->primary(['c_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}


