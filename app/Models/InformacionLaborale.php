<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InformacionLaborale
 *
 * @property $id
 * @property $cedula
 * @property $compania
 * @property $cargo
 * @property $ingreso
 * @property $retiro
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InformacionLaborale extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'compania', 'cargo', 'ingreso', 'retiro', 'telefono'];
    
    public function verificacionesLaborales()
    {
        return $this->hasMany(VerificacionesLaborale::class, 'id_laboral');
    }

}
