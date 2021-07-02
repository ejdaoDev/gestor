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
    
   
    
}
