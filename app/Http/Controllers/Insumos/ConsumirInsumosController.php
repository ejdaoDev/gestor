<?php

namespace App\Http\Controllers\Insumos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use Session;
use Carbon\Carbon;

class ConsumirInsumosController extends Controller {

    public function getView() {
        return view('insumos.ConsumirInsumos');
    }

}
