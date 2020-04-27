<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratista', function (Blueprint $table) {
            $table->bigIncrements('id_contratista');
            $table->string('razon_social');
            $table->string('direccion');
            $table->unsignedBigInteger('id_ciudad');
            $table->string('correo', 50)->unique();
            $table->string('telefono');
            $table->string('representante_legal');

            $table->string('imagen_firma')->nullable();
            $table->timestamps();

            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratista');
    }
}
