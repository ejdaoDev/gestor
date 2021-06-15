<?php

namespace App\Http\Controllers\Insumos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Insumos\Insumo;
use App\Models\Insumos\ListaTemporalInsumos;
use App\Models\Insumos\ListaInsumos;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class AgregarInsumoController extends Controller {

    public function getView() {
        $insumos = Insumo::all();
        $presentaciones_1 = Presentacion::all()->where("medida_id", 1);
        $presentaciones_2 = Presentacion::all()->where("medida_id", 2);
        $count = ListaTemporalInsumos::all()->where("created_by", auth()->id())->count();
        return view('insumos.AgregarInsumo', compact("insumos", "presentaciones_1", "presentaciones_2","count"));
    }

    public function add(Request $request) {
        $request->cantidad = str_replace(",", "", $request->cantidad);
        if (str_contains($request->cantidad, ".")) {
            Session::flash('tienedecimal', 'El numero no debe contener decimales');
            return redirect("AgregarInsumo");
        }
        $exist = ListaTemporalInsumos::all()->where("insumo_id",$request->id)->where("created_by", auth()->id())->count();
        if ($exist > 0) {
            Session::flash('addpreviously', 'El insumo fue agregado antes a la lista');
            return redirect("AgregarInsumo");
        }
        
        $insumo = Insumo::findOrFail($request->id);
        $upd["used"] = 1;
        $ins["insumo_id"] = $request->id;
        $ins["cantidad"] = $request->cantidad;
        $ins["medida_id"] = $insumo["medida_id"];
        $ins["presentacion_id"] = $request->presentacion;
        $ins["created_by"] = auth()->id();
        
        \DB::beginTransaction();
            try {
                \DB::commit();
                ListaTemporalInsumos::create($ins);
                $insumo->update($upd);
                Session::flash('insaddtolist', 'El insumo fue agregado a la lista correctamente');
                return redirect("AgregarInsumo");
            } catch (\Throwable $ex) {
                \DB::rollback();
                Session::flash('insnoaddtolist', 'Algo falló' . $ex);
                return redirect("AgregarInsumo");
            }
            
    }

}
