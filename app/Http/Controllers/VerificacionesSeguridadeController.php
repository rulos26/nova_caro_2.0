<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesSeguridade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesSeguridadeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesSeguridadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesSeguridades = VerificacionesSeguridade::paginate();

        return view('verificaciones-seguridade.index', compact('verificacionesSeguridades'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesSeguridades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesSeguridade = new VerificacionesSeguridade();

        return view('verificaciones-seguridade.create', compact('verificacionesSeguridade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesSeguridadeRequest $request): RedirectResponse
    {
        VerificacionesSeguridade::create($request->validated());

        return Redirect::route('verificaciones-seguridades.index')
            ->with('success', 'VerificacionesSeguridade created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesSeguridade = VerificacionesSeguridade::find($id);

        return view('verificaciones-seguridade.show', compact('verificacionesSeguridade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $verificacionesSeguridade = VerificacionesSeguridade::find($id);

        return view('verificaciones-seguridade.edit', compact('verificacionesSeguridade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesSeguridadeRequest $request, VerificacionesSeguridade $verificacionesSeguridade): RedirectResponse
    {
        $verificacionesSeguridade->update($request->validated());

        return Redirect::route('seguridades.index')
            ->with('success', 'VerificacionesSeguridade updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesSeguridade::find($id)->delete();

        return Redirect::route('verificaciones-seguridades.index')
            ->with('success', 'VerificacionesSeguridade deleted successfully');
    }
}
