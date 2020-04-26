<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visita', function (Blueprint $table) {
            $table->bigIncrements('id_visita');
            $table->string('imagen_acta');
            $table->string('observaciones');
            $table->unsignedBigInteger('id_ente');
            $table->timestamps();

            $table->foreign('id_ente')->references('id_ente')->on('ente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visita');
    }
}
