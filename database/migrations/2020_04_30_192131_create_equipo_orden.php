<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_orden', function (Blueprint $table) {
            $table->bigIncrements('id_equipo_orden');
            $table->unsignedBigInteger('id_tipo_de_equipo');
            $table->unsignedBigInteger('id_orden_de_compra');
            $table->timestamps();

            //FKs
            $table->foreign('id_tipo_de_equipo')->references('id_tipo_de_equipo')->on('tipo_de_equipo');
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
        Schema::dropIfExists('equipo_orden');
    }
}
