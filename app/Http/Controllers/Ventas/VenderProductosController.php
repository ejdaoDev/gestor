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

class VenderProductosController extends Controller {

    public function getView() {
        if ($this->getRol() == "VENTAS" | $this->getRol() == "ADMINISTRADOR"){
        $productos = ListaTemporalVenta::all()->where("created_by", auth()->id());
        $presentaciones_1 = Presentacion::all()->where("medida_id", 1);
        $presentaciones_2 = Presentacion::all()->where("medida_id", 2);
        $total = ListaTemporalVenta::all()->where("created_by", auth()->id())->sum('val_total');
        return view('ventas.VenderProductos', compact("productos", "presentaciones_1", "presentaciones_2", "total"));
        }else{
            return back();
        }
    }

    public function deleteOne($id) {

        $productoInList = ListaTemporalVenta::findOrFail($id);
        $producto = Producto::findOrFail($productoInList["producto_id"]);
        $medida = Presentacion::findOrFail($productoInList["presentacion_id"]);
        $cantidad = $productoInList["cantidad"] * $medida["multfactor"];
        $updpro["stock"] = $producto["stock"] + $cantidad;
        $producto->update($updpro);
        $productoInList->delete();
        Session::flash('deletenice', 'El producto fue descartado de la lista correctamente');
        return redirect("VenderProductos");
    }

    public function deleteAll() {

        $productosInList = ListaTemporalVenta::all()->where("created_by", auth()->id());
        foreach ($productosInList as $product) {
            $producto = Producto::findOrFail($product->producto_id);
            $medida = Presentacion::findOrFail($product->presentacion_id);
            $cantidad = $product->cantidad * $medida["multfactor"];
            $updpro["stock"] = $producto["stock"] + $cantidad;
            $producto->update($updpro);
            $product->delete();
        }

        Session::flash('deleteallnice', 'Los productos fueron descartados de la lista correctamente');
        return redirect("VenderProductos");
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

        if ($cantidad > ($producto["stock"] + $oldcantidad) || $cantidad <= 0) {
            Session::flash('badcant', 'El numero no puede ser mayor al stock o menor/igual a 0');
            return redirect("VenderProductos");
        }

        $stock = $producto["stock"] + $oldcantidad;
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
