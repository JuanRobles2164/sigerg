<?php

namespace App\Http\Controllers\Utilities;

use Exception;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class Util{
    public static function cifrarClave(string $clave) : string
    {
        $clave = crypt($clave, '$6$rounds=100$descifremeesta$');
        $clave = substr($clave, 30);
        return $clave;
    }
    public static function enviarEmail(string $destinatario, string $asunto, string $cuerpo){
        //$from = correo@deprueba.com
        $headers = "From: correo@deprueba.com";
        try{
            mail($destinatario,$asunto,$cuerpo, $headers);
        }catch(Exception $e){
            echo '------ El correo no pudo enviarse ------ \n'.$e;
        }
    }
    public static function getCookieByName(string $cookie_name){
        $cookie_retorno = Cookie::get($cookie_name);
        $cookie_retorno = Crypt::decrypt($cookie_retorno, false);
        $cookie_retorno = json_decode($cookie_retorno);
        return $cookie_retorno;
    }
}