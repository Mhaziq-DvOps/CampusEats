<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('P_Id');
            $table->string('P_Name');
            $table->unsignedBigInteger('Cat_Id');
            $table->foreign('Cat_Id')->references('P_Cat_Id')->on('product_category')->onDelete('cascade');
            $table->unsignedBigInteger('P_Shop')->nullable();
            $table->foreign('P_Shop')->references('shop_id')->on('shop')->onDelete('cascade');
            $table->string('P_Duration');
            $table->string('S_Description');
            $table->string('L_Description', 500)->nullable();
            $table->double('P_Price');
            $table->double('P_Disc_Price')->nullable();
            $table->string('P_Image')->nullable();
            $table->integer('P_Status')->nullable();
            $table->integer('P_Quantity')->nullable();
            $table->string('P_Slug')->nullable();
            // Defina a Json column in the migration
            $table->json('features')->nullable();
            // $table->tinyInteger('features.fry')->default(false);
            // $table->tinyInteger('features.spicy')->default(false);
            // $table->tinyInteger('features.grill')->default(false);
            // $table->tinyInteger('features.healthy')->default(false);
            // $table->tinyInteger('features.soup')->default(false);
            // $table->tinyInteger('features.noodles')->default(false);
            // $table->tinyInteger('features.rice')->default(false);
            // $table->tinyInteger('features.chicken')->default(false);
            // $table->tinyInteger('features.chilli')->default(false);
            // $table->tinyInteger('features.seafood')->default(false);
            // $table->tinyInteger('features.meat')->default(false);
            // $table->tinyInteger('features.halal')->default(false);
            // $table->tinyInteger('features.carbs')->default(false);
            // $table->tinyInteger('features.fat')->default(false);
            // $table->tinyInteger('features.fruit')->default(false);
            // $table->tinyInteger('features.vegie')->default(false);
            $table->timestamps();
            
            // $affected = DB::table('product')
            //             -> where('P_Id')
            //             -> update(['features' => 'spicy', 'halal']);

        });
        
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}

