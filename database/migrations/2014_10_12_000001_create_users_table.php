<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->onDelete('cascade');
            $table->string('nombres')->nullable();
            $table->string('apellidos');
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cargo')->nullable();
            $table->string('telefono');
            $table->unsignedBigInteger('id_area')->nullable();
            $table->rememberToken();
            $table->boolean('estado')->default(true);
            $table->timestamps();
            //FKs
            $table->foreign('id_area')->references('id_area')->on('area');
        });
        DB::table('users')
        ->insert([
            'id' => 1,
            'nombres' => 'Juan Esteban',
            'apellidos' => 'Robles Chanagá',
            'email' => 'juanse2164@hotmail.com',
            'password' => '$2y$10$DWAA/XhrUCsD.M0l.KyYSus.VqIEgW9rqvBO7dc8cG6TspNcE8i.q',
            'cargo' => 'Cargo',
            'telefono' => '3121',
            'created_at' => '2020-05-06 03:57:25',
            'updated_at' => '2020-05-06 03:57:25'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
