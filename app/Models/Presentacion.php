<?php

namespace App\Models;

use App\Models\Modelo;

class Presentacion extends Modelo
{
    protected $table = 'gipresentacion';
    protected $fillable = [
        "id",
        "medida_id",
        "nombre",
        "abreviacion",
        "multfactor",
        "created",
        "created_by",
        ];
    
   
    
}
