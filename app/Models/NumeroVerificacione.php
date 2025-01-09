<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NumeroVerificacione
 *
 * @property $id
 * @property $cedula
 * @property $cuenta
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class NumeroVerificacione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cedula', 'cuenta'];


}
