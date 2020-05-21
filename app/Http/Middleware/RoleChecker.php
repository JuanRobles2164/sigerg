<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $guards)
    {
        if(isset($request->user()->roles)){
            $route = Route::getRoutes()->match($request)->uri();
            $continue = false;
            foreach($request->user()->roles as $role){
                //Si la URL no coincide con la abreviatura del role, no va a poder continuar
                if(strpos($route, $role->abreviatura) !== false){
                    $continue = true;
                    break;
                }
            }
            if($continue){
                return $next($request);
            }
        }
        return route('roles');
    }
}
