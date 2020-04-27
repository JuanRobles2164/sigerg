<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencia', function (Blueprint $table) {
            $table->bigIncrements('id_evidencia');
            $table->boolean('cumple')->default(false);
            /*
            $table->boolean('plagas')->default(false);
            $table->boolean('bpm')->default(false);
            $table->boolean('capacitacion')->default(false);
            $table->boolean('aseguramiento')->default(false);
            $table->boolean('mantenimiento')->default(false);
            */ 
            $table->unsignedBigInteger('id_tipo_de_evidencia');
            $table->unsignedBigInteger('id_visita');
            $table->timestamps();
            //FKs
            $table->foreign('id_tipo_de_evidencia')->references('id_tipo_de_evidencia')->on('tipo_de_evidencia');
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
        Schema::dropIfExists('evidencia');
    }
}
