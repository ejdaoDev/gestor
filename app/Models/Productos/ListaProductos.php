<?php

namespace App\Models\Productos;

use Illuminate\Database\Eloquent\Model;

class ListaProductos extends Model
{
    protected $table = 'gilistaproductos';
    public $timestamps = false;  
    protected $fillable = [
        "id",
        "producto_id",
        "cantidad",
        "presentacion_id",
        "created",
        "created_by",
        ];
    
   
    
}
