<?php

namespace App\Http\Controllers;

use App\Models\Aspirante;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AspiranteRequest;
use App\Models\Busqueda;
use App\Models\Municipio;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AspiranteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $cedula = session('cedula');
        // Verificar si la variable está vacía
        if (empty($cedula)) {
            $busqueda = new Busqueda();

            return view('busqueda.create', compact('busqueda'));
        }

        // Obtén los aspirantes por cédula
        $aspirantes = Aspirante::where('cedula', $cedula)->with(['ciudad', 'lugar_expedicion', 'municipio'])->get();

        if ($aspirantes->isEmpty()) {
            $creado = 0; // esta vacia  se pèude crear  el resgistro
        } else {
            $creado = 1; // esta esta lleno no se pèude crear  el resgistro
        }
        ///dd($aspirantes);
        return view('aspirante.index', compact('aspirantes', 'creado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cedula = session('cedula');
        // Verificar si la variable está vacía
        if (empty($cedula)) {
            $busqueda = new Busqueda();

            return view('busqueda.create', compact('busqueda'));
        }
        $aspirante = new Aspirante();

        $lugar_expedicion = Municipio::all();
        $lugar_nacimiento = Municipio::all();
        $ciudad = Municipio::all();
        return view('aspirante.create', compact('aspirante', 'cedula', 'lugar_expedicion', 'lugar_nacimiento', 'ciudad'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //dd($request);
        Aspirante::create($request->all());

        return Redirect::route('aspirantes.index')
            ->with('success', 'Aspirante created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cedula = session('cedula');
        // Verificar si la variable está vacía
        if (empty($cedula)) {
            $busqueda = new Busqueda();

            return view('busqueda.create', compact('busqueda'));
        }
        $aspirante = Aspirante::find($id);

        return view('aspirante.show', compact('aspirante'));
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
        $aspirante = Aspirante::find($id);
        $lugar_expedicion = Municipio::all();
        $lugar_nacimiento = Municipio::all();
        $ciudad = Municipio::all();
        return view('aspirante.edit', compact('aspirante', 'cedula', 'lugar_expedicion', 'lugar_nacimiento', 'ciudad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AspiranteRequest $request, Aspirante $aspirante): RedirectResponse
    {
        $aspirante->update($request->all());

        return Redirect::route('aspirantes.index')
            ->with('success', 'Aspirante updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Aspirante::find($id)->delete();

        return Redirect::route('aspirantes.index')
            ->with('success', 'Aspirante deleted successfully');
    }
}
