<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->bigIncrements('id_solicitud');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_restaurante');
            $table->unsignedBigInteger('id_visita');
            $table->unsignedBigInteger('id_tipo_de_equipo');
            $table->string('descripcion')->nullable();
            //En los timestamps va la fecha en que se realizó la petición
            $table->timestamps();

            //FKs
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario');
            $table->foreign('id_area')->references('id_area')->on('area');
            $table->foreign('id_restaurante')->references('id_restaurante')->on('restaurante');
            $table->foreign('id_visita')->references('id_visita')->on('visita');
            $table->foreign('id_tipo_de_equipo')->references('id_tipo_de_equipo')->on('tipo_de_equipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud');
    }
}
