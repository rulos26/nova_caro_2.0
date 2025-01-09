<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesNegocio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesNegocioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesNegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesNegocios = VerificacionesNegocio::paginate();

        return view('verificaciones-negocio.index', compact('verificacionesNegocios'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesNegocios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesNegocio = new VerificacionesNegocio();

        return view('verificaciones-negocio.create', compact('verificacionesNegocio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesNegocioRequest $request): RedirectResponse
    {
        VerificacionesNegocio::create($request->validated());

        return Redirect::route('verificaciones-negocios.index')
            ->with('success', 'VerificacionesNegocio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesNegocio = VerificacionesNegocio::find($id);

        return view('verificaciones-negocio.show', compact('verificacionesNegocio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $verificacionesNegocio = VerificacionesNegocio::find($id);

        return view('verificaciones-negocio.edit', compact('verificacionesNegocio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesNegocioRequest $request, VerificacionesNegocio $verificacionesNegocio): RedirectResponse
    {
        $verificacionesNegocio->update($request->validated());

        return Redirect::route('negocios.index')
            ->with('success', 'VerificacionesNegocio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesNegocio::find($id)->delete();

        return Redirect::route('negocios.index')
            ->with('success', 'VerificacionesNegocio deleted successfully');
    }
}
