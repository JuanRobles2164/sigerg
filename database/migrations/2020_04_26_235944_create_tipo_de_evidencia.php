<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTipoDeEvidencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_de_evidencia', function (Blueprint $table) {
            $table->bigIncrements('id_tipo_de_evidencia');
            $table->string('tipo_de_evidencia');
            $table->timestamps();
        });

        DB::table('tipo_de_evidencia')
        ->insert([
            ['tipo_de_evidencia' => 'Plagas', 'created_at' => date('Y-m-d')],
            ['tipo_de_evidencia' => 'BPM', 'created_at' => date('Y-m-d')],
            ['tipo_de_evidencia' => 'Capacitación', 'created_at' => date('Y-m-d')],
            ['tipo_de_evidencia' => 'Aseguramiento', 'created_at' => date('Y-m-d')],
            ['tipo_de_evidencia' => 'Mantenimiento', 'created_at' => date('Y-m-d')]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_de_evidencia');
    }
}
