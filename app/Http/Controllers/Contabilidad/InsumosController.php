<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Insumos\Insumo;
use App\Models\Insumos\ListaTemporalInsumos;
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
        } else {
            return back();
        }
    }

    public function showListaConsumoInsumos() {
        if ($this->getRol() == "ADMINISTRADOR") {
            $insumos = InsumoConsumido::all();
            return view("contabilidad.ListaConsumoInsumos",compact("insumos"));
        } else {
            return back();
        }
    }
}
