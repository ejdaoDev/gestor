<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Insumos\Insumo;
use App\Models\Insumos\ListaInsumos;
use App\Models\Insumos\FacturaInsumos;
use App\Models\Insumos\InsumoConsumido;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class InsumosController extends Controller {

    public function showListaIngresosInsumos() {
        if ($this->getRol() == "ADMINISTRADOR") {
            $facturas = FacturaInsumos::all();
            return view("contabilidad.ListaIngresosInsumos", compact("facturas"));
        } else if ($this->getRol() == "INVENTARIO INSUMOS") {
            $facturas = FacturaInsumos::all()->where("created_by", auth()->id());
            return view("contabilidad.ListaIngresosInsumos", compact("facturas"));
        } else {
            return back();
        }
    }
    
   public function showListaIngresosInsumosDetails($id) {
        if ($this->getRol() == "ADMINISTRADOR" | $this->getRol() == "INVENTARIO INSUMOS") {
            $facturas = ListaInsumos::all()->where("factins_id",$id);
        
            return view("contabilidad.ListaIngresosInsumosDetails", compact("facturas"));
        } else {
            return back();
        }
    }

    public function showListaConsumoInsumos() {
        if ($this->getRol() == "ADMINISTRADOR") {
            $insumos = InsumoConsumido::all();
            return view("contabilidad.ListaConsumoInsumos",compact("insumos"));
        } else if ($this->getRol() == "INVENTARIO PRODUCTOS") {
            $insumos = InsumoConsumido::all()->where("created_by", auth()->id());
            return view("contabilidad.ListaConsumoInsumos",compact("insumos"));
        } else {
            return back();
        }
    }
}
