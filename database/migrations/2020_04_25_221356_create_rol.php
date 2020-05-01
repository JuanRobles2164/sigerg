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
            $table->timestamps();
        });
        DB::table('rol')
        ->insert([
            ['rol' => 'Administrador del sistema'],
            ['rol' => 'Administrador de restaurante'],
            ['rol' => 'Líder de mantenimiento']
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
