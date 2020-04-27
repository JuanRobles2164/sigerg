<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestauranteVisita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurante_visita', function (Blueprint $table) {
            $table->bigIncrements('id_restaurante_visita');
            $table->unsignedBigInteger('id_restaurante');
            $table->unsignedBigInteger('id_visita');
            $table->timestamps();

            //FKs
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
        Schema::dropIfExists('restaurante_visita');
    }
}
