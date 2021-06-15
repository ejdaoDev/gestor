<?php

namespace App\Http\Controllers\Productos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use Session;
use Carbon\Carbon;

class ModificarProductoController extends Controller
{
     
     
    
    public function getView() {
       return view('productos.ModificarProducto');   
    }
    
    /*
    public function registrar(Request $request) {
        
    if(auth()->id() === 1){
        $this->validate($request, ['cedula' => 'required|string|max:50|unique:usuarios']);
         $this->validate($request, ['nombres' => 'required|string|max:50']);
         $this->validate($request, ['apellidos' => 'required|string|max:50']);
         $this->validate($request, ['email' => 'required|string|email|max:255|unique:usuarios']);
         $this->validate($request, ['password' => 'required|string|min:6|max:255|confirmed']);
         
         $user['cedula']=$request->cedula;
         $user['nombres']=$request->nombres;
         $user['apellidos']=$request->apellidos;
         $user['email']= $request->email;
         $user['password']= bcrypt($request->password);
         $user['usuario_id']= auth()->id();
         
        
              Usuario::create($user);
         
         Session::flash('usuariocreado','El usuario fue registrado correctamente');
         return view("Seguridad.RegistrarUsuario");
         
        
    }
    Session::flash('usuarionoautorizado','El usuario no está autorizado para crear nuevos usuarios');
     return redirect("home");
       
    }*/
    
}
