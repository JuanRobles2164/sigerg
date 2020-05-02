<?php

use App\Http\Controllers\Utilities\Util;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->bigIncrements('id_usuario');
            $table->string('usuario');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('cargo');
            $table->string('correo', 50)->unique();
            $table->string('telefono');
            $table->string('contrasenia');
            $table->unsignedBigInteger('id_area')->nullable();
            $table->timestamps();
            //FKs
            $table->foreign('id_area')->references('id_area')->on('area');
        });
        DB::table('usuario')
        ->insert([
            'usuario' => 'Armando',
            'nombres' => 'Armando',
            'apellidos' => 'Villamizar',
            'cargo' => 'Jefe de desarrollo',
            'correo' => 'armando@sistema.com',
            'telefono' => '123456',
            'contrasenia' => Util::cifrarClave('a2020'),
            'created_at' => date('Y-m-d')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
