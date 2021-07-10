<?php

namespace App\Http\Controllers\Insumos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Insumos\Insumo;
use App\Models\Insumos\InsumoConsumido;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class ConsumirInsumoController extends Controller {

    public function getView() {
        if ($this->getRol() == "INVENTARIO PRODUCTOS" | $this->getRol() == "ADMINISTRADOR"){
        $insumos = Insumo::all();
        $presentaciones_1 = Presentacion::all()->where("medida_id", 1);
        $presentaciones_2 = Presentacion::all()->where("medida_id", 2);
        return view('insumos.ConsumirInsumo', compact("insumos", "presentaciones_1", "presentaciones_2"));
        }else{
            return back();
        }
    }

    public function consume(Request $request) {
        $request->cantidad = str_replace(",", "", $request->cantidad);
          if (str_contains($request->cantidad, ".")) {
            Session::flash('tienedecimal', 'El numero no debe contener decimales');
            return redirect("ConsumirInsumo");
        }
        $insumo = Insumo::findOrFail($request->id);        
        $multfact = Presentacion::findOrFail($request->presentacion);
        $realcant = $request->cantidad * $multfact["multfactor"];

        if ($insumo["stock"] < $realcant) {
            Session::flash('cantidadnovalida', 'La cantidad a consumir supera el stock disponible');
            return redirect("ConsumirInsumo");
        }
        
        $inscons["insumo_id"] = $insumo->id;
        $inscons["cantidad"] = $realcant;
        $inscons["presentacion_id"] = $request->presentacion;
        $inscons["created"] = Carbon::now();
        $inscons["created_by"] = auth()->id();
        
        InsumoConsumido::create($inscons);
        $upd["stock"] = $insumo["stock"]-$realcant;
        $upd["updated"] = Carbon::now();
        $upd["updated_by"] = auth()->id();
        $insumo->update($upd);
        Session::flash('insumoconsumido', 'El insumo ha sido retirado del stock correctamente');
        return redirect("ConsumirInsumo");
        
        
        
    }

}
