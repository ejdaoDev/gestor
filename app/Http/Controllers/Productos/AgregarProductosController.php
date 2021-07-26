<?php

namespace App\Http\Controllers\Productos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Productos\Producto;
use App\Models\Productos\ListaProductos;
use App\Models\Productos\ListaTemporalProductos;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class AgregarProductosController extends Controller
{
     
     
    
    public function getView() {
        if ($this->getRol() == "INVENTARIO PRODUCTOS" | $this->getRol() == "ADMINISTRADOR"){
        $insumos = ListaTemporalProductos::all()->where("created_by", auth()->id());
        $presentaciones_1 = Presentacion::all()->where("medida_id", 1);
        $presentaciones_2 = Presentacion::all()->where("medida_id", 2);
       return view('productos.AgregarProductos', compact("insumos", "presentaciones_1", "presentaciones_2"));  
        }else{
            return back();
        }
    }
     public function deleteOne($id) {
        $insumo = ListaTemporalProductos::findOrFail($id);
        $insumo->delete();
        Session::flash('deletenice', 'El producto fue descartado de la lista');
        return redirect("AgregarProductos");
    }
    
     public function deleteAll() {
        $insumos = ListaTemporalProductos::all()->where("created_by", auth()->id());
        foreach ($insumos as $insumo) {
            $insumo->delete();
        }
        Session::flash('deleteallnice', 'Los productos fueron descartados de la lista');
        return redirect("AgregarProductos");
    }

    public function modifyOne($id, Request $request) {
        $request->cantidad = str_replace(",", "", $request->cantidad);
        if (str_contains($request->cantidad, ".")) {
            Session::flash('tienedecimal', 'El numero no debe contener decimales');
            return redirect("AgregarProductos");
        }
        $insumo = ListaTemporalProductos::findOrFail($id);
        $upd["cantidad"] = $request->cantidad;
        $upd["presentacion_id"] = $request->presentacion;
        $insumo->update($upd);
        return redirect("AgregarProductos");
    }

   

    public function addAll(Request $request) {
        $request->cantidad = str_replace(",", "", $request->cantidad);
        $listInsumos = ListaTemporalProductos::all()->where("created_by", auth()->id());
        \DB::beginTransaction();
        try {
            foreach ($listInsumos as $insumoInList) {
                $newIns["producto_id"] = $insumoInList->producto_id;
                $newIns["cantidad"] = $insumoInList->cantidad;
                $newIns["presentacion_id"] = $insumoInList->presentacion_id;                
                $newIns["created"] = Carbon::now();
                $newIns["created_by"] = auth()->id();
                $insumo = Producto::findOrFail($insumoInList->producto_id);
                $presentacion = Presentacion::findOrFail($insumoInList->presentacion_id);
                $upd["stock"] = $insumo["stock"]+($insumoInList["cantidad"] * $presentacion["multfactor"]);
                $insumo->update($upd);
                ListaProductos::create($newIns);
                $insumoInList->delete();
            }
            \DB::commit();
                Session::flash('productosagregados', 'Los productos fueron agregados correctamente');                
                return redirect("AgregarProducto");
              
        } catch (\Throwable $ex) {
            \DB::rollback();
            Session::flash('productosnoagregados', 'Algo falló' . $ex);          
            return redirect("AgregarProducto");
        }
        
        
    }    
}
