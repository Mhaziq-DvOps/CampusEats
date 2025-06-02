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
        Schema::table('product', function (Blueprint $table) {
            if (!Schema::hasColumn('product', 'promotion_id')) {
                $table->unsignedBigInteger('promotion_id')->nullable()->after('P_Status');

                $table->foreign('promotion_id')
                      ->references('Promotion_Id')->on('promotion')
                      ->onDelete('set null');            //
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            //
                        if (Schema::hasColumn('product', 'promotion_id')) {
                $table->dropForeign(['promotion_id']);
                $table->dropColumn('promotion_id');
                        }
        });
    }
};
