<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacion', function (Blueprint $table) {
            $table->bigIncrements('id_observacion');
            $table->longText('descripcion')->nullable();
            $table->unsignedBigInteger('id_visita');
            $table->timestamps();

            //FKs
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
        Schema::dropIfExists('observacion');
    }
}
