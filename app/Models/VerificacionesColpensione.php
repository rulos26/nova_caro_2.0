<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VerificacionesColpensione
 *
 * @property $id
 * @property $cedula
 * @property $verificacion
 * @property $id_colpensiones
 * @property $verificado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VerificacionesColpensione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'verificacion', 'id_colpensiones', 'verificado'];
    public function links_b(){
        return $this->belongsTo(Link::class, 'id_colpensiones');
    }

}
