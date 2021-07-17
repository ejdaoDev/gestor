<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Insumos\Insumo;
use App\Models\Insumos\ListaTemporalInsumos;
use App\Models\Insumos\ListaInsumos;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class InsumosController extends Controller {

    public function showListaIngresosInsumos() {
        if ($this->getRol() == "ADMINISTRADOR") {
            return view("contabilidad.ListaIngresosInsumos");
        } else {
            return back();
        }
    }

    public function showListaConsumoInsumos() {
        if ($this->getRol() == "ADMINISTRADOR") {
            return view("contabilidad.ListaConsumoInsumos");
        } else {
            return back();
        }
    }
}
