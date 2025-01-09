<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesTransito;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesTransitoRequest;
use App\Models\Busqueda;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesTransitoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesTransitos = VerificacionesTransito::paginate();

        return view('verificaciones-transito.index', compact('verificacionesTransitos'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesTransitos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesTransito = new VerificacionesTransito();

        return view('verificaciones-transito.create', compact('verificacionesTransito'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesTransitoRequest $request): RedirectResponse
    {
        VerificacionesTransito::create($request->validated());

        return Redirect::route('verificaciones-transitos.index')
            ->with('success', 'VerificacionesTransito created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesTransito = VerificacionesTransito::find($id);

        return view('verificaciones-transito.show', compact('verificacionesTransito'));
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
        $verificacionesTransito = VerificacionesTransito::find($id);

        return view('verificaciones-transito.edit', compact('verificacionesTransito'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesTransitoRequest $request, VerificacionesTransito $verificacionesTransito): RedirectResponse
    {
        $verificacionesTransito->update($request->validated());

        return Redirect::route('transitos.index')
            ->with('success', 'VerificacionesTransito updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesTransito::find($id)->delete();

        return Redirect::route('verificaciones-transitos.index')
            ->with('success', 'VerificacionesTransito deleted successfully');
    }
}
