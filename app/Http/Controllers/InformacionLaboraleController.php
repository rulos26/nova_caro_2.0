<?php

namespace App\Http\Controllers;

use App\Models\InformacionLaborale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\InformacionLaboraleRequest;
use App\Models\Busqueda;
use App\Models\VerificacionesLaborale;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Svg\Tag\Rect;

class InformacionLaboraleController extends Controller
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
        $informacionLaborales = InformacionLaborale::where('cedula', $cedula)
            ->with('verificacionesLaborales')
            ->get();

        $count = $informacionLaborales->count(); // Obtén el conteo de registros

        if ($count < 3) {
            $creado = 0; // Se puede crear el registro porque hay menos de 3 registros existentes
        } else {
            $creado = 1; // No se puede crear el registro porque ya hay 3 o más registros existentes
        }





        //dd($informacionLaborales);
        return view('informacion-laborale.index', compact('informacionLaborales', 'creado'));
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
        //dd($cedula);
        $informacionLaborales = InformacionLaborale::where('cedula', $cedula)->get();
        $count = $informacionLaborales->count(); // Obtén el conteo de registros

        if ($count < 3) {
            $informacionLaborale = new InformacionLaborale();

            return view('informacion-laborale.create', compact('informacionLaborale', 'cedula'));
        } else {
            $informacionLaborales = InformacionLaborale::where('cedula', $cedula)->get();
            $count = $informacionLaborales->count(); // Obtén el conteo de registros

            if ($count < 3) {
                $creado = 0; // Se puede crear el registro porque hay menos de 3 registros existentes
            } else {
                $creado = 1; // No se puede crear el registro porque ya hay 3 o más registros existentes
            }
            return view('informacion-laborale.index', compact('informacionLaborales', 'creado'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $cedula = session('cedula');

        // Crear el registro en la base de datos y almacenar el modelo recién creado en una variable
        $informacionLaboral = InformacionLaborale::create([
            'cedula' => $cedula,
            'compania' => $request->compania,
            'cargo' => $request->cargo,
            'ingreso' => $request->ingreso,
            'retiro' => $request->retiro,
            'telefono' => $request->telefono,
        ]);
        // Obtener el ID del registro recién creado
        $ultimoId = $informacionLaboral->id;

        VerificacionesLaborale::create([
            'cedula' => $cedula,
            'verificacion' => ' ',
            'id_laboral' => $ultimoId,
            'verificado' => '0',
            
        ]);;



        return view('informacion-laborale.validar');
        /*  return Redirect::route('informacion-laborales.index')
            ->with('success', 'InformacionLaborale created successfully.'); */
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cedula = session('cedula');
        // Verificar si la variable está vacía
        if (empty($cedula)) {
            $busqueda = new Busqueda();

            return view('busqueda.create', compact('busqueda'));
        }
        $informacionLaborale = InformacionLaborale::find($id);

        return view('informacion-laborale.show', compact('informacionLaborale'));
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
        $informacionLaborale = InformacionLaborale::find($id);

        return view('informacion-laborale.edit', compact('informacionLaborale', 'cedula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InformacionLaboraleRequest $request, InformacionLaborale $informacionLaborale): RedirectResponse
    {
        $informacionLaborale->update($request->all());

        return Redirect::route('informacion-laborales.index')
            ->with('success', 'InformacionLaborale updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        InformacionLaborale::find($id)->delete();

        return Redirect::route('informacion-laborales.index')
            ->with('success', 'InformacionLaborale deleted successfully');
    }
}
