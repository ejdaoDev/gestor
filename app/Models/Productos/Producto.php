<?php

namespace App\Models\Productos;

use App\Models\Modelo;

class Producto extends Modelo
{
    protected $table = 'giproductos';
    protected $fillable = [
        "nombre",
        "stock",
        "used",
        "medida_id",
        "created",
        "created_by",
        "updated",
        "updated_by",
        ];    
    
   
    
}
