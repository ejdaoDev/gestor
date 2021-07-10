<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas\FacturaVenta;
use App\Models\Insumos\FacturaInsumos;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $hoy = date("Y-m-d");
        //$hoy2 = date("Y-m-d",strtotime($hoy."+ 1 day"));
        $ayer = date("Y-m-d",strtotime($hoy."- 30 days"));
        $currentYear = date("Y");
        $firstday = $currentYear."-01-01";
        $lastday = $currentYear."-12-31";
        $inicio = Carbon::createFromFormat('Y-m-d',$firstday);
        $fin = Carbon::createFromFormat('Y-m-d',$lastday);
        $var1 = FacturaVenta::all()->where("created_by", auth()->id())->whereBetween("createdate",[$ayer,$hoy])->sum("valorpago");
        $var2 = FacturaVenta::all()->where("created_by", auth()->id())->whereBetween("createdate",[$firstday,$lastday])->sum("valorpago");
        $var3 = FacturaInsumos::all()->where("created_by", auth()->id())->whereBetween("createdate",[$ayer,$hoy])->sum("valorpago");
        $var4 = FacturaInsumos::all()->where("created_by", auth()->id())->whereBetween("createdate",[$firstday,$lastday])->sum("valorpago");

            return view('home', compact("var1", "var2","var3", "var4"));        
      
        
    }
    
}
