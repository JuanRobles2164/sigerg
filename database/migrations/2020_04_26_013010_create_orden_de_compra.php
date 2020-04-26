<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenDeCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_de_compra', function (Blueprint $table) {
            $table->bigIncrements('id_orden_de_compra');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_solicitud');
            $table->unsignedBigInteger('id_tipo_de_mantenimiento');
            $table->unsignedBigInteger('id_clase_de_mantenimiento');
            $table->unsignedBigInteger('id_componente');
            $table->date('fecha_oc');
            $table->date('fecha_entrega');
            $table->string('detalle');
            $table->float('cantidad', 12, 2);
            $table->float('costo', 12, 2);
            $table->unsignedBigInteger('id_contratista');
            $table->unsignedBigInteger('id_estado');
            $table->timestamps();

            //FKs
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario');
            $table->foreign('id_solicitud')->references('id_solicitud')->on('solicitud');
            $table->foreign('id_tipo_de_mantenimiento')->references('id_tipo_de_mantenimiento')->on('tipo_de_mantenimiento');
            $table->foreign('id_clase_de_mantenimiento')->references('id_clase_de_mantenimiento')->on('clase_de_mantenimiento');
            $table->foreign('id_contratista')->references('id_contratista')->on('contratista');
            $table->foreign('id_componente')->references('id_componente')->on('componente');
            $table->foreign('id_estado')->references('id_estado')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_de_compra');
    }
}
