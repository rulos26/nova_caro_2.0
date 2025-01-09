<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AspiranteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'nombres' => 'required|string',
			'cedula' => 'required|string',
			'id_lugar_expedicion' => 'required',
			'dia_nacimiento' => 'required',
			'mes_nacimiento' => 'required',
			'año_nacimiento' => 'required',
			'id_lugar_nacimiento' => 'required',
			'edad' => 'required',
			'direccion' => 'required|string',
			'barrio' => 'required|string',
			'id_ciudad' => 'required',
			'telefono_fijo' => 'string',
			'móvil' => 'string',
			'cargo' => 'required|string',
        ];
    }
}
