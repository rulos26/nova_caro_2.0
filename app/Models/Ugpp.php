<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ugpp
 *
 * @property $id
 * @property $cedula
 * @property $id_link
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ugpp extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'id_link'];

    public function VerificacionesUgpp(){
        return $this->hasMany(VerificacionesUgpp::class, 'id_ugpps');
    }

    public function link(){
        return $this->belongsTo(Link::class, 'id_link');
    }

    public function modulo(){
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }


}
