<?php

namespace App\Http\Controllers;

use App\Models\InformacionesAcademica;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\InformacionesAcademicaRequest;
use App\Models\Busqueda;
use App\Models\Municipio;
use App\Models\VerificacionesAcademica;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InformacionesAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $cedula = session('cedula');
        // Verificar si la variable está vacía
        if (empty($cedula)) {
            $busqueda = new Busqueda();

            return view('busqueda.create', compact('busqueda'));
        }
        $informacionesAcademicas = InformacionesAcademica::where('cedula', $cedula)
        ->with('verificacionesAcademica','municipio')
        ->get();
        $count = $informacionesAcademicas->count(); // Obtén el conteo de registros

        if ($count < 3) {
            $creado = 0; // Se puede crear el registro porque hay menos de 3 registros existentes
        } else {
            $creado = 1; // No se puede crear el registro porque ya hay 3 o más registros existentes
        }

//dd($informacionesAcademicas);
        return view('informaciones-academica.index', compact('informacionesAcademicas','creado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cedula = session('cedula');
        // Verificar si la variable está vacía
        if (empty($cedula)) {
            $busqueda = new Busqueda();

            return view('busqueda.create', compact('busqueda'));
        }
       
        $informacionesAcademicas = InformacionesAcademica::where('cedula', $cedula)->get();
        $count = $informacionesAcademicas->count(); // Obtén el conteo de registros
        if ($count < 3) {
            $informacionesAcademica = new InformacionesAcademica();
            $ciudad = Municipio::all();
            return view('informaciones-academica.create', compact('informacionesAcademica','cedula','ciudad'));
        } else {
            $informacionesAcademicas = InformacionesAcademica::where('cedula', $cedula)->get();
            $count = $informacionesAcademicas->count(); // Obtén el conteo de registros

            if ($count < 3) {
                $creado = 0; // Se puede crear el registro porque hay menos de 3 registros existentes
            } else {
                $creado = 1; // No se puede crear el registro porque ya hay 3 o más registros existentes
            }
            return view('informaciones-academica.index', compact('informacionLaborales', 'creado'));
        }

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cedula = session('cedula');
        $informacionAcademica = InformacionesAcademica::create([
            'cedula' => $cedula,
            'institucion' => $request->institucion,
            'titulo_programa' => $request->titulo_programa,
            'fecha_de_grado' => $request->fecha_de_grado,
            'telefono' => $request->telefono,
            'id_ciudad_academica' => $request->id_ciudad_academica,
            
            
        ]);
        // Obtener el ID del registro recién creado
        $ultimoId = $informacionAcademica->id;
        VerificacionesAcademica::create([
            'cedula' => $cedula,
            'verificacion' => ' ',
            'id_academica' => $ultimoId,
            'verificado' => '0',
            
        ]);;

        return view('informaciones-academica.validar');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $informacionesAcademica = InformacionesAcademica::find($id);

        return view('informaciones-academica.show', compact('informacionesAcademica'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cedula = session('cedula');
        // Verificar si la variable está vacía
        if (empty($cedula)) {
            $busqueda = new Busqueda();

            return view('busqueda.create', compact('busqueda'));
        }
        $informacionesAcademica = InformacionesAcademica::find($id);
        $ciudad = Municipio::all();
        return view('informaciones-academica.edit', compact('informacionesAcademica','cedula','ciudad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformacionesAcademica $informacionesAcademica): RedirectResponse
    {
        $informacionesAcademica->update($request->all());

        return Redirect::route('informaciones-academicas.index')
            ->with('success', 'InformacionesAcademica updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        InformacionesAcademica::find($id)->delete();

        return Redirect::route('informaciones-academicas.index')
            ->with('success', 'InformacionesAcademica deleted successfully');
    }
}
