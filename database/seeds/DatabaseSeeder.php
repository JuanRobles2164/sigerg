<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 80; $i++){
            $id = DB::table('users')->insertGetId([
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'nombres' => Str::random(20),
                'cargo' => Str::random(20),
                'apellidos' => Str::random(20)
            ]);
            $randomRole = rand(1, 3);
            DB::table('rol_perfil')
            ->insert([
                'id_rol' => $randomRole,
                'id_usuario' => $id
            ]);
        }
    }
}
