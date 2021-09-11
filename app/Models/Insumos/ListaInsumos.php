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
        "numerac",
        "presentacion_id",
        "factins_id",
        "created",
        "created_by",
        ];
    
      public function usuario()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Seguridad\Usuario','created_by','id');
    }
    
     public function insumo()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Insumos\Insumo');
    }
    
     public function presentacion()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Presentacion');
    }
    
    
   
    
}
