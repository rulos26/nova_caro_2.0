<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ObservacionesChecklist
 *
 * @property $id
 * @property $cedula
 * @property $observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ObservacionesChecklist extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'observaciones'];


}
