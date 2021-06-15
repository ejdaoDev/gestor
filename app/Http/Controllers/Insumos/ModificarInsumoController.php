<?php

namespace App\Http\Controllers\Insumos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Models\Seguridad\Usuario;
use App\Models\Insumos\Insumo;
use Session;
use Carbon\Carbon;

class ModificarInsumoController extends Controller {

    public function getView() {
        if ($this->getPermiso(4)) {
            $insumos = Insumo::all()->where("used", false);
            return view('insumos.ModificarInsumo', compact("insumos"));
        } else {
            return redirect("home");
        }
    }

    public function modify(Request $request) {
       
            $insumo = Insumo::findOrFail($request->id);
            if ($insumo["nombre"] != strtoupper(trim($request->nombre))) {
                $this->validate($request, ['nombre' => 'unique:giinsumos']);
            }
            $upd['nombre'] = strtoupper(trim($request->nombre));
            $upd['medida_id'] = $request->medida;
            $upd['updated'] = Carbon::now();
            $upd['updated_by'] = auth()->id();
            \DB::beginTransaction();
            try {
                $insumo->update($upd);
                \DB::commit();
                Session::flash('insumoactualizado', 'El insumo fue actualizado correctamente');
                return redirect("ModificarInsumo");
            } catch (\Throwable $ex) {
                \DB::rollback();
                Session::flash('insumonoactualizado', 'Algo falló' . $ex);
                return redirect("ModificarInsumo");
            }
        } 
    

}
