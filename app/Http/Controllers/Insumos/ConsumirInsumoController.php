<?php

namespace App\Http\Controllers\Insumos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Insumos\Insumo;
use App\Models\Presentacion;
use Session;
use Carbon\Carbon;

class ConsumirInsumoController extends Controller {

    public function getView() {
        $insumos = Insumo::all();
        $presentaciones_1 = Presentacion::all()->where("medida_id", 1);
        $presentaciones_2 = Presentacion::all()->where("medida_id", 2);
        return view('insumos.ConsumirInsumo', compact("insumos","presentaciones_1","presentaciones_2"));
    }
    
    public function  consume(){
        
    }
}
