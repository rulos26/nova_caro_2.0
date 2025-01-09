<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesCredito;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesCreditoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesCreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesCreditos = VerificacionesCredito::paginate();

        return view('verificaciones-credito.index', compact('verificacionesCreditos'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesCreditos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesCredito = new VerificacionesCredito();

        return view('verificaciones-credito.create', compact('verificacionesCredito'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesCreditoRequest $request): RedirectResponse
    {
        VerificacionesCredito::create($request->validated());

        return Redirect::route('verificaciones-creditos.index')
            ->with('success', 'VerificacionesCredito created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesCredito = VerificacionesCredito::find($id);

        return view('verificaciones-credito.show', compact('verificacionesCredito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $verificacionesCredito = VerificacionesCredito::find($id);

        return view('verificaciones-credito.edit', compact('verificacionesCredito'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesCreditoRequest $request, VerificacionesCredito $verificacionesCredito): RedirectResponse
    {
        $verificacionesCredito->update($request->validated());

        return Redirect::route('creditos.index')
            ->with('success', 'VerificacionesCredito updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesCredito::find($id)->delete();

        return Redirect::route('verificaciones-creditos.index')
            ->with('success', 'VerificacionesCredito deleted successfully');
    }
}
