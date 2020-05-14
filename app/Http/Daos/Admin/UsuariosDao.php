<?php

namespace App\Http\Daos\Admin;

use App\Http\Daos\Dao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosDao extends Dao{
    public static function getAllRoles(){
        $roles = DB::table('rol')
        ->get();
        return $roles;
    }
    public static function GetUserById($id){
        $user = DB::table('users')
        ->where('id', $id)
        ->first();
        return $user;
    }
    public static function getAllUsuarios($paginate = 15){
        $usuarios = null;
        if($paginate == -1){
            $usuarios = DB::table('users')
            ->join('rol_perfil', 'rol_perfil.id_usuario', '=', 'users.id')
            ->join('rol', 'rol.id_rol', '=', 'rol_perfil.id_rol')
            ->select('users.*', 'rol.rol')
            ->get();
        }else{
            $usuarios = DB::table('users')
            ->join('rol_perfil', 'rol_perfil.id_usuario', '=', 'users.id')
            ->join('rol', 'rol.id_rol', '=', 'rol_perfil.id_rol')
            ->select('users.*', 'rol.*')
            ->paginate($paginate);
        }
        return $usuarios;
    }    
    public static function CreateUser(array $user, string $pass){
        $id = DB::table('users')
        ->insertGetId([
            'nombres' => $user['nombres'],
            'apellidos' => $user['apellidos'],
            'email' => $user['email'],
            'cargo' => $user['cargo'],
            'password' => $pass,
            'telefono' => $user['telefono'],
        ]);
        DB::table('rol_perfil')
        ->insert([
            'id_usuario' => $id,
            'id_rol' => $user['id_rol']
        ]);
        return true;
    }
    public static function UpdateUser(array $user){
        DB::table('user')
        ->update(
            [
            'nombres' => $user['nombres'],
            'apellidos' => $user['apellidos'],
            'email' => $user['email'],
            'cargo' => $user['cargo'],
            'password' => $user['password'],
            'telefono' => $user['telefono'],
            ]
        )
        ->where('id', $user['id']);
        return true;
    }
    public static function DeleteUser($id){
        DB::table('rol_perfil')
        ->where('id_usuario', $id)
        ->delete();
        DB::table('users')
        ->where('id', $id)
        ->delete();
        return true;
    }
}