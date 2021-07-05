<?php

namespace App\Http\Controllers\Ventas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Productos\Producto;
use App\Models\Ventas\ListaTemporalVenta;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class VenderProductosController extends Controller
{
     
     
    
    public function getView() {
        $productos = ListaTemporalVenta::all();
        $presentaciones_1 = Presentacion::all()->where("medida_id", 1);
        $presentaciones_2 = Presentacion::all()->where("medida_id", 2);        
       return view('ventas.VenderProductos', compact("productos", "presentaciones_1", "presentaciones_2"));   
    }
    
    public function modifyOne($id, Request $request) {
        $request->cantidad = str_replace(",", "", $request->cantidad);
        if (str_contains($request->cantidad, ".")) {
            Session::flash('tienedecimal', 'El numero no debe contener decimales');
            return redirect("VenderProductos");
        }
        
       
         
        $productoInList = ListaTemporalVenta::findOrFail($id);
         $medida = Presentacion::findOrFail($request->presentacion);
         $oldmedida = Presentacion::findOrFail($productoInList["presentacion_id"]);
         $cantidad = $request->cantidad * $medida["multfactor"];         
         $oldcantidad = $productoInList["cantidad"] * $oldmedida["multfactor"];         
        $producto = Producto::findOrFail($productoInList["producto_id"]);
        
        if($cantidad > ($producto["stock"]+$oldcantidad) || $cantidad <= 0){
            Session::flash('badcant', 'El numero no puede ser mayor al stock o menor/igual a 0');
            return redirect("VenderProductos");
        }
        
        $stock = $producto["stock"]+$oldcantidad;
        $updpro["stock"] = $stock - $cantidad;
        $updpro["updated"] = Carbon::now();
        $updpro["updated_by"] = auth()->id();
        $producto->update($updpro);
        $updven["presentacion_id"] = $request->presentacion;
        $updven["cantidad"] = $request->cantidad;
        $updven["val_total"] = $producto["precio"] * $cantidad;
       $productoInList->update($updven);   
        
        Session::flash('allnice', 'La cantidad fue modificada correctamente');
           return redirect("VenderProductos");
    }
    
    
}
