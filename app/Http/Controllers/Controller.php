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
    
    public function getRol(){
        $user = Usuario::findOrFail(auth()->id());
        return $user->rol->nombre;       
    } 
}
