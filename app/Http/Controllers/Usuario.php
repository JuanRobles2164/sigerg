<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Utilities\Util;
use App\Http\Daos\UsuarioDao;
use Illuminate\Http\Request;
use stdClass;

class Usuario extends Controller
{
    private $ruta = 'Contents/';
    public function getLogin(Request $request){
        return view($this->ruta.'login');
    }
    public function postLogin(Request $request){
        $data = new stdClass();
        //$data->contrasenia = Util::cifrarClave($request->contrasenia);
        $data->contrasenia = $request->contrasenia;
        $data->correo = $request->usuario;
        $data->usuario = $request->usuario;
        if(UsuarioDao::validarUsuario($data)){
            return 'Logeado';
        }
        return 'No autenticado';
        
    }
}
