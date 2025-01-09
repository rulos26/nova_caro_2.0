<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ModuloRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $modulos = Modulo::paginate();

        return view('modulo.index', compact('modulos'))
            ->with('i', ($request->input('page', 1) - 1) * $modulos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $modulo = new Modulo();

        return view('modulo.create', compact('modulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModuloRequest $request): RedirectResponse
    {
        Modulo::create($request->validated());

        return Redirect::route('modulos.index')
            ->with('success', 'Modulo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $modulo = Modulo::find($id);

        return view('modulo.show', compact('modulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $modulo = Modulo::find($id);

        return view('modulo.edit', compact('modulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModuloRequest $request, Modulo $modulo): RedirectResponse
    {
        $modulo->update($request->validated());

        return Redirect::route('modulos.index')
            ->with('success', 'Modulo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Modulo::find($id)->delete();

        return Redirect::route('modulos.index')
            ->with('success', 'Modulo deleted successfully');
    }
}
