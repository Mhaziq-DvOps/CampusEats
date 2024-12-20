 <?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->bigIncrements('Manager_id');
            $table->bigInteger('Shop_Id')->unsigned();
            $table->foreign('Shop_Id')->references('Shop_Id')->on('shop')
            ->onDelete('cascade');
            $table->string('Name');
            $table->string('Email');
            $table->string('Password');
            $table->boolean('isBanned')  ->default(0);
            $table->string('Phone');
            $table->string('Street_1');
            $table->integer('Postcode');
            $table->string('City');
            $table->string('State');
            $table->integer('Ban');
            $table->string('Reason');
            $table->rememberToken();
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
        Schema::dropIfExists('manager');
    }
}
