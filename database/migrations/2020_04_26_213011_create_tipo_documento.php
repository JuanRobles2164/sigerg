<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTipoDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_documento', function (Blueprint $table) {
            $table->bigIncrements('id_tipo_documento');
            $table->string('tipo_documento');
            $table->timestamps();
        });
        DB::table('tipo_documento')
        ->insert([
            ['tipo_documento' => 'Equipos cálidos', 'created_at' => date('Y-m-d')],
            ['tipo_documento' => 'Refrigeración', 'created_at' => date('Y-m-d')],
            ['tipo_documento' => 'Tanque de Agua', 'created_at' => date('Y-m-d')],
            ['tipo_documento' => 'Trampa de grasa', 'created_at' => date('Y-m-d')],
            ['tipo_documento' => 'Verificación de temperaturas', 'created_at' => date('Y-m-d')],
            ['tipo_documento' => 'Revisión de solicitudes de mantenimiento', 'created_at' => date('Y-m-d')]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_documento');
    }
}
