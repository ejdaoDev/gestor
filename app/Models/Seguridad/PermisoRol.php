<?php

namespace App\Models\Seguridad;

use App\Models\Modelo;

class PermisoRol extends Modelo
{
    protected $table = 'gipermiso_girol';
      
    protected $fillable = [
        "rol_id",
        "permiso_id",
        "created",
        "created_by",
        "updated",
        "updated_by",
        ];    
    
   
    
}
