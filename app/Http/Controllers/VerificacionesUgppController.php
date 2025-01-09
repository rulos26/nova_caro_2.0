<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesUgpp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesUgppRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesUgppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $verificacionesUgpps = VerificacionesUgpp::paginate();

        return view('verificaciones-ugpp.index', compact('verificacionesUgpps'))
            ->with('i', ($request->input('page', 1) - 1) * $verificacionesUgpps->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesUgpp = new VerificacionesUgpp();

        return view('verificaciones-ugpp.create', compact('verificacionesUgpp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesUgppRequest $request): RedirectResponse
    {
        VerificacionesUgpp::create($request->validated());

        return Redirect::route('verificaciones-ugpps.index')
            ->with('success', 'VerificacionesUgpp created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesUgpp = VerificacionesUgpp::find($id);

        return view('verificaciones-ugpp.show', compact('verificacionesUgpp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $verificacionesUgpp = VerificacionesUgpp::find($id);

        return view('verificaciones-ugpp.edit', compact('verificacionesUgpp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesUgppRequest $request, VerificacionesUgpp $verificacionesUgpp): RedirectResponse
    {
        $verificacionesUgpp->update($request->validated());

        return Redirect::route('ugpps.index')
            ->with('success', 'VerificacionesUgpp updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesUgpp::find($id)->delete();

        return Redirect::route('verificaciones-ugpps.index')
            ->with('success', 'VerificacionesUgpp deleted successfully');
    }
}
