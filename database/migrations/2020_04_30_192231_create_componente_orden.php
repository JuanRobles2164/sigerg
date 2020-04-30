<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponenteOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componente_orden', function (Blueprint $table) {
            $table->bigIncrements('id_componente_orden');
            $table->unsignedBigInteger('id_componente');
            $table->unsignedBigInteger('id_orden_de_compra');
            $table->timestamps();
            //FKs
            $table->foreign('id_componente')->references('id_componente')->on('componente');
            $table->foreign('id_orden_de_compra')->references('id_orden_de_compra')->on('orden_de_compra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('componente_orden');
    }
}
