<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Seguridad\Rol;
use Session;
use Carbon\Carbon;

class RegistrarUsuarioController extends Controller {

    public function getView() {
    if ($this->getRol() == "ADMINISTRADOR"){
            $roles = Rol::all();
            return view('seguridad.RegistrarUsuario', compact("roles"));
        } else {
            return back();
        }
    }

    public function register(Request $request) {
        $this->validate($request, ['numide' => 'required|unique:giusuarios']);
        $this->validate($request, ['rol' => 'required']);
        $this->validate($request, ['email' => 'required|email|unique:giusuarios']);
        $this->validate($request, ['password' => 'required|min:6|max:20|confirmed']);

        $user['tipide_id'] = 1; //Cedula de Ciudadanía predeterminada
        $user['numide'] = trim($request->numide);
        $user['prinom'] = trim(ucwords($request->prinom));
        if ($request->secnom != null) {
            $user['secnom'] = trim(ucwords($request->secnom));
        }
        $user['priape'] = trim(ucwords($request->priape));
        if ($request->secape != null) {
            $user['secape'] = trim(ucwords($request->secape));
        }
        $user['rol_id'] = $request->rol;
        $user['email'] = $request->email;
        $user['password'] = bcrypt($request->password);
        $user['created'] = Carbon::now();
        $user['created_by'] = auth()->id();

        \DB::beginTransaction();
        try {
            Usuario::create($user);
            \DB::commit();
            Session::flash('usuariocreado', 'El usuario fue registrado correctamente');
            return redirect("RegistrarUsuario");
        } catch (\Throwable $ex) {
            \DB::rollback();
            Session::flash('usuarionocreado', 'Algo falló' . $ex);
            return redirect("RegistrarUsuario");
        }
    }

}
