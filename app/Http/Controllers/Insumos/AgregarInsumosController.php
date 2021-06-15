<?php

namespace App\Http\Controllers\Insumos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Insumos\ListaTemporalInsumos;
use App\Models\Insumos\ListaInsumos;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class AgregarInsumosController extends Controller {

    public function getView() {
        $insumos = ListaTemporalInsumos::all()->where("created_by", auth()->id());
        $presentaciones_1 = Presentacion::all()->where("medida_id", 1);
        $presentaciones_2 = Presentacion::all()->where("medida_id", 2);
        return view('insumos.AgregarInsumos', compact("insumos","presentaciones_1","presentaciones_2"));
    }

    public function deleteOne($id) {
        $insumo = ListaTemporalInsumos::findOrFail($id);
        $insumo->delete();
        Session::flash('deletenice', 'El insumo fue descartado de la lista');
        return redirect("AgregarInsumos");
    }
    
    public function modifyOne($id,Request $request) {
        $request->cantidad = str_replace(",", "", $request->cantidad);
        if (str_contains($request->cantidad, ".")) {
            Session::flash('tienedecimal', 'El numero no debe contener decimales');
            return redirect("AgregarInsumos");
        }
        $insumo = ListaTemporalInsumos::findOrFail($id);
        $upd["cantidad"] = $request->cantidad;
        $upd["presentacion_id"] = $request->presentacion;
        $insumo->update($upd);
        return redirect("AgregarInsumos");
    }
    
    public function deleteAll() {
        $insumos = ListaTemporalInsumos::all()->where("created_by", auth()->id());
        foreach($insumos as $insumo){
            $insumo->delete();
        }        
        Session::flash('deleteallnice', 'Los insumos fueron descartados de la lista');
        return redirect("AgregarInsumos");
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

      } */
}
