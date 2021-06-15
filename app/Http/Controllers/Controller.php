<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Seguridad\Usuario;
use App\Models\Seguridad\PermisoRol;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('reset.password');             
    }
    
    public function getPermiso($id){
        $user = Usuario::findOrFail(auth()->id());
        $permisos = PermisoRol::all()->where("rol_id",$user["rol_id"]);
        $coincidencias = 0;
        foreach($permisos as $permiso){
            if($permiso->permiso_id == $id){
                $coincidencias++;
            }
        }
        if($coincidencias>0){
            return true;
        }else{
            return false;
        }
    }

}
