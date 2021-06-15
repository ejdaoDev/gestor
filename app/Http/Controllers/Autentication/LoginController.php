<?php

namespace App\Http\Controllers\Autentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\JsonResponse;
use Session;

class LoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }
    
     public function getView()
    {
        return view("auth.login");
    }
    
     public function login(Request $request)
    {
         $credentials = $request->only('email', 'password');         
         if(Auth::attempt($credentials)){
             request()->session()->regenerate();
             $user = Usuario::findOrFail(auth()->id());
             if($user["active"] == false){
                $this->logout();                
                Session::flash('inactivo', 'su usuario se encuentra inactivo, consulte al administrador');
             return redirect('login');
             }             
             return redirect('home');           
         }else{
             Session::flash('nologueado', 'estas credenciales no coinciden con nuestros registros');
             return redirect('login');
         }
         
    }
    
    public function logout()
    {
        $this->guard()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

   

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
    
 
    
    
}
