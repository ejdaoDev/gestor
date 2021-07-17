<?php

namespace App\Models\Insumos;

use App\Models\Modelo;

class InsumoConsumido extends Modelo
{
    protected $table = 'giinsumosconsumidos';
    protected $fillable = [
        "insumo_id",
        "cantidad",
        "presentacion_id",
        "created",
        "created_by",
        ];    
    
    public function usuario()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Seguridad\Usuario','created_by','id');
    }
    
     public function insumo()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Insumos\Insumo');
    }
    
     public function presentacion()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Presentacion');
    }
    
}
