<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacoras extends Model
{
    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombre',
        'apellidos',
        'celular',
        'correo',
        'tipo_alternativa',
        'estado_sofia',
        'proyecto',
        'arl',
        'ficha',
        'nombre_programa',
        'instructor_seguimiento',
        'numero_radicado',
        'numero_bitacoras',
        'fecha_asignacion',
        'fecha_inicio_ep',
        'fecha_fin_ep',
        'observaciones',
        'momentos', 
        'paz_salvo',
    ];

   
}

