<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 *
 * @property $id
 * @property $nombre
 * @property $estado
 * @property $id_departamento
 * @property $created_at
 * @property $updated_at
 *
 * @property Departamento $departamento
 * @property Aspirante[] $aspirantes
 * @property Aspirante[] $aspirantes
 * @property Aspirante[] $aspirantes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipio extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'estado', 'id_departamento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class, 'id_departamento', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ciudad() 
    {
        return $this->hasMany(\App\Models\Aspirante::class, 'id', 'id_ciudad');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lugar_expedicion()
    {
        return $this->hasMany(\App\Models\Aspirante::class, 'id', 'id_lugar_expedicion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aspirantes_lugar_nacimiento()
    {
        return $this->hasMany(\App\Models\Aspirante::class, 'id', 'id_lugar_nacimiento');
    }
    
}
