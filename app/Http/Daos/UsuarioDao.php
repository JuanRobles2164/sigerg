<?php

namespace App\Http\Daos;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Usuario;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Utilities\Util;

class UsuarioDao extends Controller
{
    public static function validarUsuario($data){
        $usuario = DB::table('usuario')
        ->where('contrasenia', $data->contrasenia)
        ->where(function($query) use ($data){
            $query->where('usuario', $data->usuario)
            ->orWhere('correo', $data->correo); 
            } 
        )
        ->exists();
        return $usuario;
    }
    public static function registrarUsuario($data){
        DB::table('usuario')
        ->insert([
            'usuario' => $data->usuario,
            'cargo' => $data->cargo,
            'correo' => $data->correo,
            'telefono' => $data->telefono,
            'contrasenia' => $data->contrasenia,
            'area' => $data->area,
            'created_at' => date('Y-m-d')
        ]);
    }
    public static function getUserById($id_usuario){
        $usuario = DB::table('usuario')
        ->where('id_usuario', $id_usuario);
        return $usuario;
    }
}
