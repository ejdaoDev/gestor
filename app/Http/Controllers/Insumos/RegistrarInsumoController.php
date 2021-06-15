<?php

namespace App\Http\Controllers\Insumos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Models\Seguridad\Usuario;
use App\Models\Insumos\Insumo;
use Session;
use Carbon\Carbon;

class RegistrarInsumoController extends Controller {

    public function getView() {
        if ($this->getPermiso(3)) {
            return view('insumos.RegistrarInsumo');
        } else {
            return redirect("home");
        }
    }

    public function register(Request $request) {

         if ($this->getPermiso(3)) {
            $this->validate($request, ['nombre' => 'unique:giinsumos']);

            $insumo['nombre'] = strtoupper(trim($request->nombre));
            $insumo['medida_id'] = $request->medida;
            $insumo['created'] = Carbon::now();
            $insumo['created_by'] = auth()->id();

            \DB::beginTransaction();
            try {
                Insumo::create($insumo);
                \DB::commit();
                Session::flash('insumocreado', 'El insumo fue registrado correctamente');
                return redirect("RegistrarInsumo");
            } catch (\Throwable $ex) {
                \DB::rollback();
                Session::flash('insumonocreado', 'Algo falló' . $ex);
                return redirect("RegistrarInsumo");
            }
        }else {
            return redirect("home");
        }
    }

}
