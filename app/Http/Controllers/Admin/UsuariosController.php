<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Daos\Admin\UsuariosDao;
use App\Http\Util\Utilities;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Util;

class UsuariosController extends Controller
{
    private $ruta = 'contents/admin/usuarios/';
    private static $GENERIC_PASS = 'SISTEMA_GERG_';
    /**
     * Validates specified data
     *
     * @param array $data
     * @return Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'unique:users'],
            'nombres' => ['required', 'string'], 
            'apellidos' => ['required', 'string'], 
            'cargo' => ['required', 'string'], 
            'telefono' => ['required'], 
        ]);
    }
    /**
     * Lista a todos los usuarios del sistema
     *
     * @param Request $request
     * @return array User
     */
    public function index(Request $request){
        $users = UsuariosDao::getAllUsuarios();
        $roles = UsuariosDao::getAllRoles();
        return view($this->ruta.'index')
        ->with(compact(
            'users',
            'roles'
        ));
    }
    /**
     * Recibe una petición, la valida y luego crea el usuario
     * Redirige al index de usuarios
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function PostCrearUsuario(Request $request){
        $data = $request->except('_token');
        $this->validator($data);
        $pass = Utilities::CifrarClave(self::$GENERIC_PASS.''.$data['telefono']);
        UsuariosDao::CreateUser($data, $pass);
        return redirect()->route('admin.users_index');
    }
    /**
     * Obtiene toda la información de un usuario en base a su ID
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function GetEditarUsuario(Request $request){
        return UsuariosDao::GetUserById($request->id_user);
    }
    /**
     * Receives all user's data
     * then, updates it
     * @param Request $request
     * @return JsonResponse
     */
    public function PostEditarUsuario(Request $request){
        $data = $request->except('_token');
        $this->validator($data);
        if($data['password'] != null){
            $data['password'] = Utilities::CifrarClave($data['password']);
        }
        if(UsuariosDao::UpdateUser($data)){
            return parent::$successJsonResponse;
        }
        return parent::$failedJsonResponse;
    }

    /**
     * Elimina un usuario en base al ID que reciba
     *
     * @param Request $request->id_usuario
     * @return JsonResponse
     */
    public function GetEliminarUsuario(Request $request){
        if(UsuariosDao::DeleteUser($request->id_user)){
            return parent::$successJsonResponse;
        }
        return parent::$failedJsonResponse;
    }
}
