<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Aspirante
 *
 * @property $id
 * @property $nombres
 * @property $cedula
 * @property $id_lugar_expedicion
 * @property $dia_nacimiento
 * @property $mes_nacimiento
 * @property $año_nacimiento
 * @property $id_lugar_nacimiento
 * @property $edad
 * @property $direccion
 * @property $barrio
 * @property $id_ciudad
 * @property $telefono_fijo
 * @property $móvil
 * @property $cargo
 * @property $desde
 * @property $hasta
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipio $municipio
 * @property Municipio $municipio
 * @property Municipio $municipio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Aspirante extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombres', 'cedula', 'id_lugar_expedicion', 'dia_nacimiento', 'mes_nacimiento', 'año_nacimiento', 'id_lugar_nacimiento', 'edad', 'direccion', 'barrio', 'id_ciudad', 'telefono_fijo', 'móvil', 'cargo', 'desde', 'hasta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciudad()
    {
        return $this->belongsTo(\App\Models\Municipio::class, 'id_ciudad', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lugar_expedicion()
    {
        return $this->belongsTo(\App\Models\Municipio::class, 'id_lugar_expedicion', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function municipio()
    {
        return $this->belongsTo(\App\Models\Municipio::class, 'id_lugar_nacimiento', 'id');
    }
    
}
