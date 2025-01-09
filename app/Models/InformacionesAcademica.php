<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InformacionesAcademica
 *
 * @property $id
 * @property $cedula
 * @property $institucion
 * @property $titulo_programa
 * @property $fecha_de_grado
 * @property $telefono
 * @property $id_ciudad_academica
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipio $municipio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InformacionesAcademica extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'institucion', 'titulo_programa', 'fecha_de_grado', 'telefono', 'id_ciudad_academica'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function municipio()
    {
        return $this->belongsTo(\App\Models\Municipio::class, 'id_ciudad_academica', 'id');
    }
    
    public function verificacionesAcademica(){
        return $this->hasMany(VerificacionesAcademica::class, 'id_academica');
    }
}
