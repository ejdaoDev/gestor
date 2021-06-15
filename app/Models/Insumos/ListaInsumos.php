<?php

namespace App\Models\Insumos;

use Illuminate\Database\Eloquent\Model;

class ListaInsumos extends Model
{
    protected $table = 'gilistainsumos';
    public $timestamps = false;  
    protected $fillable = [
        "id",
        "insumo_id",
        "cantidad",
        "presentacion_id",
        "factins_id",
        "created",
        "created_by",
        ];
    
   
    
}
