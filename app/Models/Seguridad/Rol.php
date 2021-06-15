<?php

namespace App\Models\Seguridad;

use App\Models\Modelo;

class Rol extends Modelo
{
    protected $table = 'giroles';
      
    protected $fillable = [
        "nombre",
        "created",
        "created_by",
        "updated",
        "updated_by",
        ];    
    
     public function permisos()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->hasMany('App\Models\Seguridad\Permiso');
    }
    
}
