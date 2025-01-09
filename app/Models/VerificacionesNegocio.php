<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VerificacionesNegocio
 *
 * @property $id
 * @property $cedula
 * @property $verificacion
 * @property $id_negocios
 * @property $verificado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VerificacionesNegocio extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'verificacion', 'id_negocios', 'verificado'];

    public function links(){
        return $this->belongsTo(Link::class, 'id_negocios');
    }
}
