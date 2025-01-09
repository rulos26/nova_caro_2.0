<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesAntecedente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesAntecedenteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesAntecedenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesAntecedentes = VerificacionesAntecedente::paginate();

        return view('verificaciones-antecedente.index', compact('verificacionesAntecedentes'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesAntecedentes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesAntecedente = new VerificacionesAntecedente();

        return view('verificaciones-antecedente.create', compact('verificacionesAntecedente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesAntecedenteRequest $request): RedirectResponse
    {
        VerificacionesAntecedente::create($request->validated());

        return Redirect::route('verificaciones-antecedentes.index')
            ->with('success', 'VerificacionesAntecedente created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesAntecedente = VerificacionesAntecedente::find($id);

        return view('verificaciones-antecedente.show', compact('verificacionesAntecedente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $verificacionesAntecedente = VerificacionesAntecedente::find($id);

        return view('verificaciones-antecedente.edit', compact('verificacionesAntecedente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesAntecedenteRequest $request, VerificacionesAntecedente $verificacionesAntecedente): RedirectResponse
    {
        $verificacionesAntecedente->update($request->validated());

        return Redirect::route('antecedentes.index')
            ->with('success', 'VerificacionesAntecedente updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesAntecedente::find($id)->delete();

        return Redirect::route('verificaciones-antecedentes.index')
            ->with('success', 'VerificacionesAntecedente deleted successfully');
    }
}
