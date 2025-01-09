<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VerificacionesAntecedente
 *
 * @property $id
 * @property $cedula
 * @property $verificacion
 * @property $id_antecedente
 * @property $verificado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VerificacionesAntecedente extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'verificacion', 'id_antecedente', 'verificado'];
   
    public function links_a(){
        return $this->belongsTo(Link::class, 'id_antecedente');
    }

}
