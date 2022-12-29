<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('idcodigo',11);
            $table->unsignedBigInteger('idcliente');
            $table->string('razon_social',60);
            $table->string('rfc',15);
            $table->double('subtotal',10,3);
            $table->double('iva',10,3);
            $table->double('total',10,3);
            $table->timestamps();

            $table->foreign('idcliente')->references('idcliente')->on('clientes');
        });

        //DB::statement("ALTER TABLE documentos AUTO_INCREMENT = 10000000000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
};
