<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Http\Daos\Roles\RolesDao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RolesController extends Controller
{
    
    /**
     * En esta función se le desplegará un menú con los roles que tenga
     * disponible un usuario. Este podrá seleccionar en cuál quiere navegar
     * @param Request $request
     * @return void
     */

    public function index(Request $request){
        $request->user()->roles = RolesDao::getRolesByUserId($request->user()->id);
        if($request->user()->roles->count() >= 2){
            //Redirige a una vista donde el usuario escogerá con qué rol proceder
            return $request->user();
        }else{
            //Redirigerá al rol que le corresponde
            return $request->user()->roles;
        }
    }
}
