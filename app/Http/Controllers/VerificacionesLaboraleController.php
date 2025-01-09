<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesLaborale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesLaboraleRequest;
use App\Models\Busqueda;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesLaboraleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesLaborales = VerificacionesLaborale::paginate();

        return view('verificaciones-laborale.index', compact('verificacionesLaborales'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesLaborales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesLaborale = new VerificacionesLaborale();

        return view('verificaciones-laborale.create', compact('verificacionesLaborale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesLaboraleRequest $request): RedirectResponse
    {
        VerificacionesLaborale::create($request->validated());

        return Redirect::route('verificaciones-laborales.index')
            ->with('success', 'VerificacionesLaborale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesLaborale = VerificacionesLaborale::find($id);

        return view('verificaciones-laborale.show', compact('verificacionesLaborale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        //dd($id);
        $cedula = session('cedula');
        // Verificar si la variable está vacía
        if (empty($cedula)) {
            $busqueda = new Busqueda();

            return view('busqueda.create', compact('busqueda'));
        }
        $verificacionesLaborale = VerificacionesLaborale::where('id_laboral', $id)->first();
        //dd($verificacionesLaborale);
        return view('verificaciones-laborale.edit', compact('verificacionesLaborale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VerificacionesLaborale $verificacionesLaborale)
    {
        //dd('hola');

        $verificacionesLaborale->update($request->all());

        return Redirect::route('informacion-laborales.index')
            ->with('success', 'VerificacionesLaborale updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesLaborale::find($id)->delete();

        return Redirect::route('verificaciones-laborales.index')
            ->with('success', 'VerificacionesLaborale deleted successfully');
    }
}
