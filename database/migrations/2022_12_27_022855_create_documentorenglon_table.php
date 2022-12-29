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
        Schema::create('documentorenglon', function (Blueprint $table) {
            $table->unsignedBigInteger('idcodigo');
            $table->string('idmaterial');

            $table->string('unidadmedida',10);
            $table->double('cantidad',10,3);
            $table->double('precio1',10,3);
            
            $table->timestamps();
            $table->foreign('idcodigo')->references('idcodigo')->on('documentos');
            $table->foreign('idmaterial')->references('idmaterial')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentorenglons');
    }
};
