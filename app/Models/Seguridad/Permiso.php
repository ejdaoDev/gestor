<?php

namespace App\Models\Seguridad;

use App\Models\Modelo;

class Permiso extends Modelo
{
    protected $table = 'gipermisos';
      
    protected $fillable = [
        "nombre",
        "created",
        "created_by",
        "updated",
        "updated_by",
        ];    
    
   
    
}
