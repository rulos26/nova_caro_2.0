<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesOtro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesOtroRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesOtroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesOtros = VerificacionesOtro::paginate();

        return view('verificaciones-otro.index', compact('verificacionesOtros'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesOtros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesOtro = new VerificacionesOtro();

        return view('verificaciones-otro.create', compact('verificacionesOtro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesOtroRequest $request): RedirectResponse
    {
        VerificacionesOtro::create($request->validated());

        return Redirect::route('verificaciones-otros.index')
            ->with('success', 'VerificacionesOtro created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesOtro = VerificacionesOtro::find($id);

        return view('verificaciones-otro.show', compact('verificacionesOtro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $verificacionesOtro = VerificacionesOtro::find($id);

        return view('verificaciones-otro.edit', compact('verificacionesOtro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesOtroRequest $request, VerificacionesOtro $verificacionesOtro): RedirectResponse
    {
        $verificacionesOtro->update($request->validated());

        return Redirect::route('otros.index')
            ->with('success', 'VerificacionesOtro updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesOtro::find($id)->delete();

        return Redirect::route('verificaciones-otros.index')
            ->with('success', 'VerificacionesOtro deleted successfully');
    }
}
