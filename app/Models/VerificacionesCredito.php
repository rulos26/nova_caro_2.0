<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VerificacionesCredito
 *
 * @property $id
 * @property $cedula
 * @property $verificacion
 * @property $id_creditos
 * @property $verificado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VerificacionesCredito extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'verificacion', 'id_creditos', 'verificado'];
    public function links(){
        return $this->belongsTo(Link::class, 'id_creditos');
    }

}
