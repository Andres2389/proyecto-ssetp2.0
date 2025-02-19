<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fichas;
use App\Models\ProgramaFormacion;
use App\Models\Instructores;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bitacoras extends Model
{
    protected $fillable = [
        'numero_documento',
        'nombre',
        'apellidos',
        'celular',
        'correo',
        'tipo_alternativa',
        'estado_sofia',
        'proyecto',
        'arl',
        'fichas_id',
        'programa_formacion_id',
        'instructores_id',
        'numero_radicado',
        'numero_bitacoras',
        'fecha_asignacion',
        'fecha_inicio_ep',
        'fecha_fin_ep',
        'observaciones',
        'momentos', 
        'paz_salvo',
        'fecha_corte',
        'fecha_18_meses',
    ];

    // Convierte los campos JSON automáticamente a array
    protected $casts = [
        'momentos' => 'array',
        'numero_bitacoras' => 'array',
        'tipo_documento' => 'array',
        'tipo_alternativa' => 'array',
        'fecha_inicio_ep' => 'datetime',
        'fecha_corte' => 'datetime',
        'fecha_asignacion' => 'datetime',
        'fecha_fin_ep' => 'datetime',
        'fecha_18_meses' => 'datetime'
    ];

    
    /**
     * Relación con Instructores
     */
    
}
