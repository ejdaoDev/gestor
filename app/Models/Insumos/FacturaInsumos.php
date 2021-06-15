<?php

namespace App\Models\Insumos;

use Illuminate\Database\Eloquent\Model;

class FacturaInsumos extends Model
{
    protected $table = 'gifactins';
    public $timestamps = false;
    protected $fillable = [
        "id",
        "valor_pago",
        "pruvisual",
        "created",
        "created_by",
        ];
    
   
    
}
