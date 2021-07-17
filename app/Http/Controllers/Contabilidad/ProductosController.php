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

class ProductosController extends Controller {

    public function showListaIngresoProductos() {
        if ($this->getRol() == "ADMINISTRADOR") {
            return view("contabilidad.ListaIngresoProductos");
        } else {
            return back();
        }
    }

    public function showListaVentaProductos() {
        if ($this->getRol() == "ADMINISTRADOR") {
            return view("contabilidad.ListaVentaProductos");
        } else {
            return back();
        }
    }
}
