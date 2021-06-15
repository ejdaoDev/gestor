<?php

namespace App\Models\Insumos;

use Illuminate\Database\Eloquent\Model;

class ListaTemporalInsumos extends Model {

    protected $table = 'gilisttempins';
    public $timestamps = false;
    protected $fillable = [
        "id",
        "insumo_id",
        "cantidad",
        "medida_id",
        "presentacion_id",
        "created_by",
    ];

    public function insumo() {
        return $this->hasOne('App\Models\Insumos\Insumo', 'id', 'insumo_id');
    }
    
    public function presentacion() {
        return $this->hasOne('App\Models\Presentacion', 'id', 'presentacion_id');
    }

}
