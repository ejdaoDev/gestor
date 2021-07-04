<?php

namespace App\Models\Productos;

use Illuminate\Database\Eloquent\Model;

class ListaTemporalProductos extends Model {

    protected $table = 'gilisttemppro';
    public $timestamps = false;
    protected $fillable = [
        "id",
        "producto_id",
        "cantidad",
        "medida_id",
        "presentacion_id",
        "created_by",
    ];

    public function producto() {
        return $this->hasOne('App\Models\Productos\Producto', 'id', 'producto_id');
    }
    
    public function presentacion() {
        return $this->hasOne('App\Models\Presentacion', 'id', 'presentacion_id');
    }

}
