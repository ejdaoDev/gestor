<?php

namespace App\Http\Controllers\Productos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Productos\Producto;
use App\Models\Productos\ListaTemporalProductos;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class AgregarProductoController extends Controller
{
     
     
    
    public function getView() {
          $productos = Producto::all();
        $presentaciones_1 = Presentacion::all()->where("medida_id", 1);
        $presentaciones_2 = Presentacion::all()->where("medida_id", 2);
        $count = ListaTemporalProductos::all()->where("created_by", auth()->id())->count();
       return view('productos.AgregarProducto',compact("productos", "presentaciones_1", "presentaciones_2", "count"));   
    
    }
     public function addOne(Request $request) {
       
        $request->cantidad = str_replace(",", "", $request->cantidad);
        if (str_contains($request->cantidad, ".")) {
            Session::flash('tienedecimal', 'El numero no debe contener decimales');
            return redirect("AgregarProducto");
        }
        $exist = ListaTemporalProductos::all()->where("producto_id", $request->id)->where("created_by", auth()->id())->count();
        if ($exist > 0) {
            Session::flash('addpreviously', 'El producto fue agregado antes a la lista');
            return redirect("AgregarProducto");
        }

        $producto = Producto::findOrFail($request->id);
        $upd["used"] = 1;
        $pro["producto_id"] = $request->id;
        $pro["cantidad"] = $request->cantidad;
        $pro["medida_id"] = $producto["medida_id"];
        $pro["presentacion_id"] = $request->presentacion;
        $pro["created_by"] = auth()->id();

        \DB::beginTransaction();
        try {
            ListaTemporalProductos::create($pro);
            $producto->update($upd);
            \DB::commit();
            Session::flash('proaddtolist', 'El producto fue agregado a la lista correctamente');
            return redirect("AgregarProducto");
        } catch (\Throwable $ex) {
            \DB::rollback();
            Session::flash('pronoaddtolist', 'Algo falló' . $ex);
            return redirect("AgregarProducto");
        }
        
    }
    
}
