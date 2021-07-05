<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class ListaTemporalVenta extends Model
{
    protected $table = 'gilisttempven';
    public $timestamps = false;  
    protected $fillable = [
        "id",
        "producto_id",
        "presentacion_id",
        "medida_id",
        "cantidad",
        "val_unit",
        "val_total",
        "created_by",
        ];
    
     public function producto() {
        return $this->hasOne('App\Models\Productos\Producto', 'id', 'producto_id');
    }
    
    public function presentacion() {
        return $this->hasOne('App\Models\Presentacion', 'id', 'presentacion_id');
    }
    
   
    
}
