<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Informe
 *
 * @property $id
 * @property $id_usuario
 * @property $cedula
 * @property $terminado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Informe extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_usuario', 'cedula', 'terminado'];
    public function users(){
        return $this->belongsTo(User::class, 'id_usuario');
    }


}
