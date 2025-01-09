<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VerificacionesRegistraduria
 *
 * @property $id
 * @property $cedula
 * @property $verificacion
 * @property $id_registraduria
 * @property $verificado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VerificacionesRegistraduria extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'verificacion', 'id_registraduria', 'verificado'];
    public function links(){
        return $this->belongsTo(Link::class, 'id_registraduria');
    }

}
