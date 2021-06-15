<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use Session;
use Carbon\Carbon;

class ModificarUsuarioController extends Controller {

    public function getView() {
        if ($this->getPermiso(2)) {
            $usuarios = Usuario::all()->where("id", "!=", auth()->id());
            return view('seguridad.ModificarUsuario', compact("usuarios"));
        } else {
            return redirect("home");
        }
    }

    public function activateUser($id) {
        if ($this->getPermiso(2)) {
            $usuario = Usuario::findOrFail($id);
            $upd["active"] = 1; //true
            $upd["updated"] = Carbon::now();
            $upd["updated_by"] = auth()->id();
            $usuario->update($upd);
            Session::flash('usuarioactivado', 'El usuario ' . ' ' . $usuario->prinom . ' ' . $usuario->priape . ' fue activado correctamente');
            return redirect("ModificarUsuario");
        } else {
            return redirect("home");
        }
    }

    public function inactivateUser($id) {
        if ($this->getPermiso(2)) {

            $usuario = Usuario::findOrFail($id);
            $upd["active"] = 0; //false
            $upd["updated"] = Carbon::now();
            $upd["updated_by"] = auth()->id();
            $usuario->update($upd);
            Session::flash('usuarioinactivado', 'El usuario ' . ' ' . $usuario->prinom . ' ' . $usuario->priape . ' fue inactivado correctamente');
            return redirect("ModificarUsuario");
        } else {
            return redirect("home");
        }
    }

    public function resetPassword($id) {
        if ($this->getPermiso(2)) {

            $usuario = Usuario::findOrFail($id);
            $upd["reset_pass"] = 1; //true
            $upd["password"] = bcrypt("123");
            $upd["updated"] = Carbon::now();
            $upd["updated_by"] = auth()->id();
            $usuario->update($upd);
            Session::flash('passrecuperada', 'La password de recuperación del usuario' . ' ' . $usuario->prinom . ' ' . $usuario->priape . ' es: "123"');
            return redirect("ModificarUsuario");
        } else {
            return redirect("home");
        }
    }

}
