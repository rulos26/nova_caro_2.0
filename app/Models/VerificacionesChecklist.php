<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VerificacionesChecklist
 *
 * @property $id
 * @property $cedula
 * @property $verificacion_1
 * @property $verificacion_2
 * @property $verificacion_3
 * @property $verificacion_final
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VerificacionesChecklist extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'verificacion_1', 'verificacion_2', 'verificacion_3', 'verificacion_final'];


}
