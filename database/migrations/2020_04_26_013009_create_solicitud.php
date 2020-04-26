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
            $table->date('fecha');
            $table->string('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuario');
            $table->foreign('id_area')->references('id_area')->on('area');
            $table->foreign('id_restaurante')->references('id_restaurante')->on('restaurante');
            $table->foreign('id_visita')->references('id_visita')->on('visita');
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
