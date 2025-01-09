<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VerificacionesOtro
 *
 * @property $id
 * @property $cedula
 * @property $verificacion
 * @property $id_otros
 * @property $verificado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VerificacionesOtro extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'verificacion', 'id_otros', 'verificado'];

    public function links(){
        return $this->belongsTo(Link::class, 'id_otros');
    }
}
