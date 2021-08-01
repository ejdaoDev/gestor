<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Insumos\Insumo;
use App\Models\Ventas\FacturaVenta;
use App\Models\Productos\ListaProductos;
use App\Models\Ventas\ListaVenta;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class ProductosController extends Controller {

    public function showListaIngresoProductos() {
        if ($this->getRol() == "ADMINISTRADOR") {
            $productos = ListaProductos::all();
            return view("contabilidad.ListaIngresoProductos", compact("productos"));
        } else if ($this->getRol() == "INVENTARIO PRODUCTOS") {
            $productos = ListaProductos::all()->where("created_by", auth()->id());
            return view("contabilidad.ListaIngresoProductos", compact("productos"));
        } else {
            return back();
        }
    }
    

    public function showListaVentaProductos() {
        if ($this->getRol() == "ADMINISTRADOR") {
            $ventas = FacturaVenta::all();
            return view("contabilidad.ListaVentaProductos", compact("ventas"));
        }else if ($this->getRol() == "VENTAS") {
            $ventas = FacturaVenta::all()->where("created_by", auth()->id());
            return view("contabilidad.ListaVentaProductos", compact("ventas"));
        }  else {
            return back();
        }
    }
    
      public function showListaVentaProductosDetails($id) {
        if ($this->getRol() == "ADMINISTRADOR" | $this->getRol() == "VENTAS") {
            $ventas = ListaVenta::all()->where("factven_id",$id);
            return view("contabilidad.ListaVentaProductosDetails", compact("ventas"));
        } else {
            return back();
        }
    }
}
