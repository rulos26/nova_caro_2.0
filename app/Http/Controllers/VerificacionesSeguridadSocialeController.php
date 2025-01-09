<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesSeguridadSociale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesSeguridadSocialeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesSeguridadSocialeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesSeguridadSociales = VerificacionesSeguridadSociale::paginate();

        return view('verificaciones-seguridad-sociale.index', compact('verificacionesSeguridadSociales'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesSeguridadSociales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesSeguridadSociale = new VerificacionesSeguridadSociale();

        return view('verificaciones-seguridad-sociale.create', compact('verificacionesSeguridadSociale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesSeguridadSocialeRequest $request): RedirectResponse
    {
        VerificacionesSeguridadSociale::create($request->validated());

        return Redirect::route('verificaciones-seguridad-sociales.index')
            ->with('success', 'VerificacionesSeguridadSociale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesSeguridadSociale = VerificacionesSeguridadSociale::find($id);

        return view('verificaciones-seguridad-sociale.show', compact('verificacionesSeguridadSociale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $verificacionesSeguridadSociale = VerificacionesSeguridadSociale::find($id);

        return view('verificaciones-seguridad-sociale.edit', compact('verificacionesSeguridadSociale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesSeguridadSocialeRequest $request, VerificacionesSeguridadSociale $verificacionesSeguridadSociale): RedirectResponse
    {
        $verificacionesSeguridadSociale->update($request->validated());

        return Redirect::route('seguridad-sociales.index')
            ->with('success', 'VerificacionesSeguridadSociale updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesSeguridadSociale::find($id)->delete();

        return Redirect::route('verificaciones-seguridad-sociales.index')
            ->with('success', 'VerificacionesSeguridadSociale deleted successfully');
    }
}
