<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('imagen_2')->nullable()->after('imagen');
        $table->string('imagen_3')->nullable()->after('imagen_2');
        $table->string('imagen_4')->nullable()->after('imagen_3');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn(['imagen_2', 'imagen_3', 'imagen_4']);
    });
}
};
