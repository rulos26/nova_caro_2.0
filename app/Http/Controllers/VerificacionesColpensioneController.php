<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesColpensione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesColpensioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesColpensioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesColpensiones = VerificacionesColpensione::paginate();

        return view('verificaciones-colpensione.index', compact('verificacionesColpensiones'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesColpensiones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesColpensione = new VerificacionesColpensione();

        return view('verificaciones-colpensione.create', compact('verificacionesColpensione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesColpensioneRequest $request): RedirectResponse
    {
        VerificacionesColpensione::create($request->validated());

        return Redirect::route('verificaciones-colpensiones.index')
            ->with('success', 'VerificacionesColpensione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesColpensione = VerificacionesColpensione::find($id);

        return view('verificaciones-colpensione.show', compact('verificacionesColpensione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $verificacionesColpensione = VerificacionesColpensione::find($id);

        return view('verificaciones-colpensione.edit', compact('verificacionesColpensione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesColpensioneRequest $request, VerificacionesColpensione $verificacionesColpensione): RedirectResponse
    {
        $verificacionesColpensione->update($request->validated());

        return Redirect::route('colpensiones.index')
            ->with('success', 'VerificacionesColpensione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesColpensione::find($id)->delete();

        return Redirect::route('verificaciones-colpensiones.index')
            ->with('success', 'VerificacionesColpensione deleted successfully');
    }
}
