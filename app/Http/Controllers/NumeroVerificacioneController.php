<?php

namespace App\Http\Controllers;

use App\Models\NumeroVerificacione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NumeroVerificacioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NumeroVerificacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $numeroVerificaciones = NumeroVerificacione::paginate();

        return view('numero-verificacione.index', compact('numeroVerificaciones'))
            ->with('i', ($request->input('page', 1) - 1) * $numeroVerificaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $numeroVerificacione = new NumeroVerificacione();

        return view('numero-verificacione.create', compact('numeroVerificacione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NumeroVerificacioneRequest $request): RedirectResponse
    {
        NumeroVerificacione::create($request->validated());

        return Redirect::route('numero-verificaciones.index')
            ->with('success', 'NumeroVerificacione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $numeroVerificacione = NumeroVerificacione::find($id);

        return view('numero-verificacione.show', compact('numeroVerificacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $numeroVerificacione = NumeroVerificacione::find($id);

        return view('numero-verificacione.edit', compact('numeroVerificacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NumeroVerificacioneRequest $request, NumeroVerificacione $numeroVerificacione): RedirectResponse
    {
        $numeroVerificacione->update($request->validated());

        return Redirect::route('numero-verificaciones.index')
            ->with('success', 'NumeroVerificacione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        NumeroVerificacione::find($id)->delete();

        return Redirect::route('numero-verificaciones.index')
            ->with('success', 'NumeroVerificacione deleted successfully');
    }
}
