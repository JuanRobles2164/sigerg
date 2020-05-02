<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Utilities\Util;
use App\Http\Daos\UsuarioDao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use stdClass;

class Usuario extends Controller
{
    private $ruta = 'Contents/';
    public function getLogin(Request $request){
        $mensaje = $request->mensaje;
        if(isset($request->mensaje)){
            return view($this->ruta.'login')->with(compact('mensaje'));
        }
        return view($this->ruta.'login');
    }
    public function redirigirPorRole(){
        
    }
    public function postLogin(Request $request){
        $data = new stdClass();
        $data->contrasenia = Util::cifrarClave($request->contrasenia);
        $data->correo = $request->usuario;
        $data->usuario = $request->usuario;
        if(UsuarioDao::validarUsuario($data)){
            $usuario = UsuarioDao::getUserByEmail($data->correo);
            $claveAutoGenerada = Util::cifrarClave($usuario->nombres.''.$usuario->apellidos);
            $_usuario = new stdClass();
            $_usuario->id = $usuario->id;
            $_usuario->nombres = $usuario->nombres;
            $_usuario->correo = $usuario->correo;
            $_usuario->cargo = $usuario->cargo;
            if(!$claveAutoGenerada == $usuario->contrasenia){
                return redirect()->route('')->cookie(cookie('usuario', Crypt::encrypt(json_encode($_usuario))));
            }else{
                return view($this->ruta.'changePassword')->with(compact(array('usuario')));
            }
        }
        $mensaje = "Error al autenticar";
        return redirect()->route('getLogin', 'mensaje='.$mensaje);
    }
    public function redirectToRoute(Request $request){

    }
}
