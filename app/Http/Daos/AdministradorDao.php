<?php

namespace App\Http\Daos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdministradorDao extends Controller
{
    public static function getAllUsers(){
        $usuarios = DB::table('usuario')->get();
        return $usuarios;
    }
}
