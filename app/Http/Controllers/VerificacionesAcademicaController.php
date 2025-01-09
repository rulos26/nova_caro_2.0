<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesAcademica;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesAcademicaRequest;
use App\Models\Busqueda;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesAcademicas = VerificacionesAcademica::paginate();

        return view('verificaciones-academica.index', compact('verificacionesAcademicas'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesAcademicas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesAcademica = new VerificacionesAcademica();

        return view('verificaciones-academica.create', compact('verificacionesAcademica'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesAcademicaRequest $request): RedirectResponse
    {
        VerificacionesAcademica::create($request->validated());

        return Redirect::route('verificaciones-academicas.index')
            ->with('success', 'VerificacionesAcademica created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesAcademica = VerificacionesAcademica::find($id);

        return view('verificaciones-academica.show', compact('verificacionesAcademica'));
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
        $verificacionesAcademica = VerificacionesAcademica::find($id);

        return view('verificaciones-academica.edit', compact('verificacionesAcademica'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesAcademicaRequest $request, VerificacionesAcademica $verificacionesAcademica): RedirectResponse
    {
        $verificacionesAcademica->update($request->validated());

        return Redirect::route('informaciones-academicas.index')
            ->with('success', 'VerificacionesAcademica updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesAcademica::find($id)->delete();

        return Redirect::route('verificaciones-academicas.index')
            ->with('success', 'VerificacionesAcademica deleted successfully');
    }
}
