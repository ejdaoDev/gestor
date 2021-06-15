<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use Session;
use Carbon\Carbon;

class RecuperarPasswordController extends Controller {
    
    public function __construct() {
             
    }
     public function getView() {
       $user =Usuario::findOrFail(auth()->id());
       if($user["reset_pass"] == true){
           return view('seguridad.RestablecerPassword'); 
       }
       if($user["reset_pass"] == false){
           return redirect("home");
       }
         
    }
    
     public function resetPass(Request $request) {
         if(strlen($request->password) < 6){
             Session::flash('error1', 'Su contraseña debe tener al menos 6 caracteres');
                return redirect("RestablecerPassword");
         }
         if($request->password != $request->password_confirmation){
             Session::flash('error2', 'Las passwords no coinciden');
                return redirect("RestablecerPassword");
         }
         $user =Usuario::findOrFail(auth()->id());
         $upd["password"] = bcrypt($request->password);
         $upd["reset_pass"] = 0;
         $user->update($upd);
         Session::flash('passrestablecida', 'Su password fue actualizada correctamente');
         return redirect("home");
    }
}