<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VerificacionesSeguridade
 *
 * @property $id
 * @property $cedula
 * @property $verificacion
 * @property $id_seguridad
 * @property $verificado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VerificacionesSeguridade extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'verificacion', 'id_seguridad', 'verificado'];
    public function links(){
        return $this->belongsTo(Link::class, 'id_seguridad');
    }

}
