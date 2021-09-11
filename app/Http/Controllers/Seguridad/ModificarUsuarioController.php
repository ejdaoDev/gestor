<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Seguridad\Rol;
use Session;
use Carbon\Carbon;

class ModificarUsuarioController extends Controller {

    public function getView() {
        if ($this->getRol() == "ADMINISTRADOR") {
            $usuarios = Usuario::all()->where("id", "!=", auth()->id());
            return view('seguridad.ModificarUsuario', compact("usuarios"));
        } else {
            return back();
        }
    }

    public function getViewMU($id) {
        if ($this->getRol() == "ADMINISTRADOR") {
            $usuario = Usuario::findOrFail($id);
            $roles = Rol::all();
            return view('seguridad.ModificarUsuarioSelect', compact("usuario", "roles"));
        } else {
            return back();
        }
    }

    public function ModifyUser(Request $request, $id) {
        if ($this->getRol() == "ADMINISTRADOR") {
            $usuario = Usuario::findOrFail($id);
            
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
            $user['updated'] = Carbon::now();
            $user['updated_by'] = auth()->id();

            $usuario->update($user);
            Session::flash('usuarioeditado', 'El usuario fue editado correctamente');
            return redirect("ModificarUsuario");
        } else {
            return back();
        }
    }

    public function activateUser($id) {

        $usuario = Usuario::findOrFail($id);
        $upd["active"] = 1; //true
        $upd["updated"] = Carbon::now();
        $upd["updated_by"] = auth()->id();
        $usuario->update($upd);
        Session::flash('usuarioactivado', 'El usuario ' . ' ' . $usuario->prinom . ' ' . $usuario->priape . ' fue activado correctamente');
        return redirect("ModificarUsuario");
    }

    public function inactivateUser($id) {
        $usuario = Usuario::findOrFail($id);
        $upd["active"] = 0; //false
        $upd["updated"] = Carbon::now();
        $upd["updated_by"] = auth()->id();
        $usuario->update($upd);
        Session::flash('usuarioinactivado', 'El usuario ' . ' ' . $usuario->prinom . ' ' . $usuario->priape . ' fue inactivado correctamente');
        return redirect("ModificarUsuario");
    }

    public function resetPassword($id) {
        $usuario = Usuario::findOrFail($id);
        $upd["reset_pass"] = 1; //true
        $upd["password"] = bcrypt("123");
        $upd["updated"] = Carbon::now();
        $upd["updated_by"] = auth()->id();
        $usuario->update($upd);
        Session::flash('passrecuperada', 'La password de recuperación del usuario' . ' ' . $usuario->prinom . ' ' . $usuario->priape . ' es: "123"');
        return redirect("ModificarUsuario");
    }

}
