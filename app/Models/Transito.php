<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transito
 *
 * @property $id
 * @property $cedula
 * @property $id_link
 * @property $verificado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Transito extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'id_link', 'verificado'];

    public function verificacionesTransito(){
        return $this->hasMany(VerificacionesTransito::class, 'id_transito');
    }

    public function link(){
        return $this->belongsTo(Link::class, 'id_link');
    }

    public function modulo(){
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }

}
