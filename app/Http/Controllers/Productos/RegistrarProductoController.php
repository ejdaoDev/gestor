<?php

namespace App\Http\Controllers\Productos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Productos\Producto;
use Session;
use Carbon\Carbon;

class RegistrarProductoController extends Controller
{
     
     
    
    public function getView() {
       return view('productos.registrarProducto');   
    }
    
    
    public function register(Request $request) {
          $this->validate($request, ['nombre' => 'unique:giproductos']);

            $producto['nombre'] = strtoupper(trim($request->nombre));
            $producto['medida_id'] = $request->medida;
            $producto['created'] = Carbon::now();
            $producto['created_by'] = auth()->id();

            \DB::beginTransaction();
            try {
                Producto::create($producto);
                \DB::commit();
                Session::flash('productocreado', 'El producto fue registrado correctamente');
                return redirect("RegistrarProducto");
            } catch (\Throwable $ex) {
                \DB::rollback();
                Session::flash('productonocreado', 'Algo falló' . $ex);
                return redirect("RegistrarProducto");
            }
    
        
    }    
}
