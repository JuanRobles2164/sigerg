<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol', function (Blueprint $table) {
            $table->bigIncrements('id_rol');
            $table->string('rol');
            $table->string('abreviatura');
            $table->timestamps();
        });
        DB::table('rol')
        ->insert([
            [
            'rol' => 'Administrador del sistema',
            'id_rol' => 1,
            'abreviatura' => 'admin'
            ],
            [
            'rol' => 'Lider de restaurante',
            'id_rol' => 2,
            'abreviatura' => 'lider restaurante'
            ],
            [
            'rol' => 'Líder de mantenimiento',
            'id_rol' => 3,
            'abreviatura' => 'lider mantenimiento'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol');
    }
}
