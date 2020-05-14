<?php

namespace App\Http\Daos\Roles;

use Illuminate\Support\Facades\DB;

class RolesDao {
    public static function getRolesByUserId($id_usuario){
        $roles = DB::table('rol_perfil')
        ->join('rol', 'rol_perfil.id_rol', '=', 'rol.id_rol')
        ->where('id_usuario', $id_usuario)
        ->select('rol.rol', 'rol.id_rol')
        ->get();
        return $roles;
    }
}