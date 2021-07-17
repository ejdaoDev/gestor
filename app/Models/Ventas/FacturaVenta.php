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
        "createdate",
        "created_by",
        ];
    
     public function usuario()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Seguridad\Usuario','created_by','id');
    }
    
   
    
}
