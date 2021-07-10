<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class ListaVenta extends Model
{
    protected $table = 'gilistaventa';
    public $timestamps = false;  
    protected $fillable = [
        "id",
        "producto_id",
        "cantidad",
        "presentacion_id",
        "factven_id",
        "created",
        "created_by",
        ];
    
   
    
}
