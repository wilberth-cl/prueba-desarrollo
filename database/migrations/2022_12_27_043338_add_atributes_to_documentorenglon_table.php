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
        Schema::table('documentorenglon', function (Blueprint $table) {
            $table->string('unidadmedida',10)->nullable();
            $table->double('cantidad',10,3)->nullable();
            $table->double('precio1',10,3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documentorenglon', function (Blueprint $table) {
            //
        });
    }
};
