<?php

namespace App\Http\Controllers;

use App\Models\Antecedente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AntecedenteRequest;
use App\Models\Busqueda;
use App\Models\Link;
use App\Models\VerificacionesAntecedente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AntecedenteController extends Controller
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
        $id_modulo = '4';
        $link_busquedas = Link::where('id_modulo', $id_modulo)->get();
        $antecedentes = Antecedente::where('cedula', $cedula)
        ->with('VerificacionesAntecedente','link','modulo')
        ->get();
        $counter = 0; // Inicializa el contador
        if ($antecedentes->isEmpty()) {
            foreach ($link_busquedas as $link_busqueda) {
                $counter++; // Incrementa el contador en cada iteración

                $trans = Antecedente::create([
                    'cedula' => $cedula,
                    'id_link' => $link_busqueda->id,
                    
                ]);

                VerificacionesAntecedente::create([
                    'cedula' => $cedula,
                    'verificacion' => ' ',
                    'id_antecedente' => $trans->id,
                    'verificado' => '0',
                ]);
            }
        }
        return view('antecedente.index', compact('antecedentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $antecedente = new Antecedente();

        return view('antecedente.create', compact('antecedente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AntecedenteRequest $request): RedirectResponse
    {
        Antecedente::create($request->validated());

        return Redirect::route('antecedentes.index')
            ->with('success', 'Antecedente created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $antecedente = Antecedente::find($id);

        return view('antecedente.show', compact('antecedente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $antecedente = Antecedente::find($id);

        return view('antecedente.edit', compact('antecedente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AntecedenteRequest $request, Antecedente $antecedente): RedirectResponse
    {
        $antecedente->update($request->validated());

        return Redirect::route('antecedentes.index')
            ->with('success', 'Antecedente updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Antecedente::find($id)->delete();

        return Redirect::route('antecedentes.index')
            ->with('success', 'Antecedente deleted successfully');
    }
}
