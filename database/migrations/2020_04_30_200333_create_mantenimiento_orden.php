<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientoOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento_orden', function (Blueprint $table) {
            $table->bigIncrements('id_mantenimiento_orden');
            $table->unsignedBigInteger('id_tipo_de_mantenimiento');
            $table->unsignedBigInteger('id_orden_de_compra');
            $table->timestamps();
            //FKs
            $table->foreign('id_tipo_de_mantenimiento')->references('id_tipo_de_mantenimiento')->on('tipo_de_mantenimiento');
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
        Schema::dropIfExists('mantenimiento_orden');
    }
}
