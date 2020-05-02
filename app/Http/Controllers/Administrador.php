<?php

namespace App\Http\Controllers;

use App\Http\Daos\AdministradorDao;
use Illuminate\Http\Request;

class Administrador extends Controller
{
    private $ruta = '/Contents/Administrador/';

    public function getIndex(Request $request){
        return view($this->ruta.'index');
    }
    public function getUsuariosIndex(Request $request){
        $usuarios = AdministradorDao::getAllUsers();
        //return json_encode($usuarios);
        return view($this->ruta.'indexUsuarios')->with(compact('usuarios'));
    }
}
