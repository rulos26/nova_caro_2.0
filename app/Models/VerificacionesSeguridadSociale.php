<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VerificacionesSeguridadSociale
 *
 * @property $id
 * @property $cedula
 * @property $verificacion
 * @property $id_seguridad_social
 * @property $verificado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VerificacionesSeguridadSociale extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'verificacion', 'id_seguridad_social', 'verificado'];

    public function links(){
        return $this->belongsTo(Link::class, 'id_seguridad_social');
    }
}
