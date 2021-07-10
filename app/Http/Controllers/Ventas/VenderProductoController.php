<?php

namespace App\Http\Controllers\Ventas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Productos\Producto;
use App\Models\Ventas\ListaTemporalVenta;
use App\Models\Ventas\ListaVenta;
use App\Models\Presentacion;
use App\Models\Ventas\FacturaVenta;
use Session;
use Carbon\Carbon;

class VenderProductoController extends Controller {

    public function getView() {
        $productos = Producto::all();
        $count = ListaTemporalVenta::all()->where("created_by", auth()->id())->count();
        $presentaciones_1 = Presentacion::all()->where("medida_id", 1);
        $presentaciones_2 = Presentacion::all()->where("medida_id", 2);
        return view('ventas.VenderProducto', compact("productos", "presentaciones_1", "presentaciones_2", "count"));
    }
    
    public  function SellProducts(Request $request){
        $request->total = str_replace(",", "", $request->total);
        $request->total = str_replace("$", "", $request->total);
        $factura["valorpago"] = $request->total;
        $factura["created"] = Carbon::now();
        $factura["created_by"] = auth()->id();
        FacturaVenta::create($factura);
        $lastFactura = FacturaVenta::where('created_by', '=', auth()->id())->orderby('id', 'DESC')->first();
        $listInsumos = ListaTemporalVenta::all()->where("created_by", auth()->id());


        \DB::beginTransaction();
        try {
            foreach ($listInsumos as $insumoInList) {
                $newIns["producto_id"] = $insumoInList->producto_id;
                $newIns["cantidad"] = $insumoInList->cantidad;
                $newIns["presentacion_id"] = $insumoInList->presentacion_id;
                $newIns["factven_id"] = $lastFactura["id"];
                $newIns["created"] = $lastFactura["created"];
                $newIns["created_by"] = auth()->id();
                ListaVenta::create($newIns);
                $insumoInList->delete();                
            }
            \DB::commit();
                Session::flash('productosvendidos', 'Los productos fueron facturados correctamente');
                return redirect("VenderProducto");
        } catch (\Throwable $ex) {
            \DB::rollback();
            Session::flash('productosnovendidos', 'Algo falló' . $ex);
            return redirect("VenderProducto");
        }
    }

    public function addToList(Request $request) {
        $request->cantidad = str_replace(",", "", $request->cantidad);
        if (str_contains($request->cantidad, ".")) {
            Session::flash('tienedecimal', 'El numero no debe contener decimales');
            return redirect("VenderProducto");
        }
        $exist = ListaTemporalVenta::all()->where("producto_id", $request->id)->where("created_by", auth()->id())->count();
        if ($exist > 0) {
            Session::flash('addpreviously', 'El producto fue agregado antes a la lista');
            return redirect("VenderProducto");
        }
        $producto = Producto::findOrFail($request->id);
        $factmult = Presentacion::findOrFail($request->presentacion);
        $unidades = $request->cantidad * $factmult["multfactor"];        
        
        if ($unidades > $producto["stock"] || $unidades <= 0  ) {
            Session::flash('badcant', 'El numero no puede ser mayor al stock o menor/igual a 0');
            return redirect("VenderProducto");
        }
        $upd["stock"] = $producto["stock"] - $unidades;      
        $ins["producto_id"] = $request->id;
        $ins["presentacion_id"] = $request->presentacion;
        $ins["medida_id"] = $producto["medida_id"];
        $ins["cantidad"] = $request->cantidad;
        $ins["medida_id"] = $producto["medida_id"];
        $ins["val_unit"] = $producto["precio"];
        $ins["val_total"] = $producto["precio"] * $unidades;
        $ins["presentacion_id"] = $request->presentacion;
        $ins["created_by"] = auth()->id();
        \DB::beginTransaction();
        try {
            ListaTemporalVenta::create($ins);
            $producto->update($upd);
            \DB::commit();
            Session::flash('insaddtolist', 'El insumo fue agregado a la lista correctamente');
            return redirect("VenderProducto");
        } catch (\Throwable $ex) {
            \DB::rollback();
            Session::flash('insnoaddtolist', 'Algo falló' . $ex);
            return redirect("VenderProducto");
        }
    }

}
