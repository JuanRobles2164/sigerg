<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolPerfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_perfil', function (Blueprint $table) {
            $table->bigIncrements('id_rol_perfil');
            $table->unsignedBigInteger('id_usuario')->onDelete('cascade');
            $table->unsignedBigInteger('id_rol');
            $table->unsignedBigInteger('id_perfil')->nullable();
            $table->timestamps();

            //FKs
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_rol')->references('id_rol')->on('rol');
            $table->foreign('id_perfil')->references('id_perfil')->on('perfil');
        });
        DB::table('rol_perfil')
        ->insert([
            'id_usuario' => 1,
            'id_rol' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_perfil');
    }
}
