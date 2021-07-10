<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class FacturaVenta extends Model
{
    protected $table = 'gifactven';
    public $timestamps = false;
    protected $fillable = [
        "id",
        "valorpago",
        "pruvisual",
        "created",
        "created_by",
        ];
    
   
    
}
