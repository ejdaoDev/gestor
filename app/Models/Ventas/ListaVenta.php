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
        "val_unit",
        "val_total",
        "factven_id",
        "created",
        "created_by",
        ];
    
     public function usuario()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Seguridad\Usuario','created_by','id');
    }
    
     public function producto()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Productos\Producto');
    }
    
     public function presentacion()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Presentacion');
    }
    
   
    
}
