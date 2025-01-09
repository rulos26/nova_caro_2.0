<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesRegistraduria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesRegistraduriaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesRegistraduriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesRegistradurias = VerificacionesRegistraduria::paginate();

        return view('verificaciones-registraduria.index', compact('verificacionesRegistradurias'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesRegistradurias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesRegistraduria = new VerificacionesRegistraduria();

        return view('verificaciones-registraduria.create', compact('verificacionesRegistraduria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesRegistraduriaRequest $request): RedirectResponse
    {
        VerificacionesRegistraduria::create($request->validated());

        return Redirect::route('verificaciones-registradurias.index')
            ->with('success', 'VerificacionesRegistraduria created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesRegistraduria = VerificacionesRegistraduria::find($id);

        return view('verificaciones-registraduria.show', compact('verificacionesRegistraduria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $verificacionesRegistraduria = VerificacionesRegistraduria::find($id);

        return view('verificaciones-registraduria.edit', compact('verificacionesRegistraduria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesRegistraduriaRequest $request, VerificacionesRegistraduria $verificacionesRegistraduria): RedirectResponse
    {
        $verificacionesRegistraduria->update($request->validated());

        return Redirect::route('registradurias.index')
            ->with('success', 'VerificacionesRegistraduria updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesRegistraduria::find($id)->delete();

        return Redirect::route('verificaciones-registradurias.index')
            ->with('success', 'VerificacionesRegistraduria deleted successfully');
    }
}
