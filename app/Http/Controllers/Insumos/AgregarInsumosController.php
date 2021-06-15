<?php

namespace App\Http\Controllers\Insumos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Models\Seguridad\Usuario;
use App\Models\Insumos\ListaTemporalInsumos;
use App\Models\Insumos\ListaInsumos;
use App\Models\Insumos\Insumo;
use App\Models\Insumos\FacturaInsumos;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class AgregarInsumosController extends Controller {

    public function getView() {
         if ($this->getPermiso(3)) {
        $insumos = ListaTemporalInsumos::all()->where("created_by", auth()->id());
        $presentaciones_1 = Presentacion::all()->where("medida_id", 1);
        $presentaciones_2 = Presentacion::all()->where("medida_id", 2);
        return view('insumos.AgregarInsumos', compact("insumos", "presentaciones_1", "presentaciones_2"));
    }else {
            return redirect("home");
        }
    }

    public function deleteOne($id) {
        $insumo = ListaTemporalInsumos::findOrFail($id);
        $insumo->delete();
        Session::flash('deletenice', 'El insumo fue descartado de la lista');
        return redirect("AgregarInsumos");
    }

    public function modifyOne($id, Request $request) {
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
        foreach ($insumos as $insumo) {
            $insumo->delete();
        }
        Session::flash('deleteallnice', 'Los insumos fueron descartados de la lista');
        return redirect("AgregarInsumos");
    }

    public function addAll(Request $request) {
        $request->cantidad = str_replace(",", "", $request->cantidad);
        $factura["valorpago"] = $request->cantidad;
        $factura["created"] = Carbon::now();
        $factura["created_by"] = auth()->id();
        FacturaInsumos::create($factura);
        $lastFactura = FacturaInsumos::where('created_by', '=', auth()->id())->orderby('id', 'DESC')->first();
        $listInsumos = ListaTemporalInsumos::all()->where("created_by", auth()->id());


        \DB::beginTransaction();
        try {
            foreach ($listInsumos as $insumoInList) {
                $newIns["insumo_id"] = $insumoInList->insumo_id;
                $newIns["cantidad"] = $insumoInList->cantidad;
                $newIns["presentacion_id"] = $insumoInList->presentacion_id;
                $newIns["factins_id"] = $lastFactura["id"];
                $newIns["created"] = $lastFactura["created"];
                $newIns["created_by"] = auth()->id();
                $insumo = Insumo::findOrFail($insumoInList->insumo_id);
                $presentacion = Presentacion::findOrFail($insumoInList->presentacion_id);
                $upd["stock"] = $insumo["stock"]+($insumoInList["cantidad"] * $presentacion["multfactor"]);
                $upd["updated"] = $lastFactura["created"];
                $upd["updated_by"] = auth()->id();
                $insumo->update($upd);
                ListaInsumos::create($newIns);
                $insumoInList->delete();                
            }
            \DB::commit();
                Session::flash('insumosagregados', 'Los insumos fueron agregados correctamente');
                return redirect("AgregarInsumo");
        } catch (\Throwable $ex) {
            \DB::rollback();
            Session::flash('insumosnoagregados', 'Algo falló' . $ex);
            return redirect("AgregarInsumo");
        }
    }

}
