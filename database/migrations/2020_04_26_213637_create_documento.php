<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->bigIncrements('id_documento');
            $table->string('documento');
            $table->boolean('documento_verificado')->default(false);
            $table->unsignedBigInteger('id_tipo_documento');
            $table->unsignedBigInteger('id_restaurante');
            $table->timestamps();
            
            //FKs
            $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documento');
            $table->foreign('id_restaurante')->references('id_restaurante')->on('restaurante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento');
    }
}
