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
        $table->string('marca')->nullable()->after('nombre');
        $table->string('categoria')->nullable()->after('marca');
        $table->boolean('oferta')->default(false)->after('precio');
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
        $table->dropColumn(['marca', 'categoria', 'oferta']);
    });
}
};
