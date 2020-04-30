<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurante', function (Blueprint $table) {
            $table->bigIncrements('id_restaurante');
            $table->string('restaurante');
            $table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_ciudad');
            $table->timestamps();
            $table->unsignedBigInteger('id_usuario'); //Dueño del restaurante

            //FKs
            $table->foreign('id_empresa')->references('id_empresa')->on('empresa');
            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudad');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurante');
    }
}
