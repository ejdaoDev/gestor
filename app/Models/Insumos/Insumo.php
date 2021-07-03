<?php

namespace App\Models\Insumos;

use App\Models\Modelo;

class Insumo extends Modelo
{
    protected $table = 'giinsumos';
    protected $fillable = [
        "nombre",
        "stock",
        "used",
        "medida_id",
        "created",
        "created_by",
        "updated",
        "updated_by",
        ];
}
