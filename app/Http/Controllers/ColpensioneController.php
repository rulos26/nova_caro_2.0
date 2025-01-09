<?php

namespace App\Http\Controllers;

use App\Models\Colpensione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ColpensioneRequest;
use App\Models\Busqueda;
use App\Models\Link;
use App\Models\VerificacionesColpensione;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ColpensioneController extends Controller
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
        $id_modulo = '5';
        $link_busquedas = Link::where('id_modulo', $id_modulo)->get();
        $colpensiones = Colpensione::where('cedula', $cedula)
        ->with('VerificacionesColpensiones','link','modulo')
        ->get();
        $counter = 0; // Inicializa el contador

        // Si no hay registros en transitos, crear nuevos registros
        if ($colpensiones->isEmpty()) {
            foreach ($link_busquedas as $link_busqueda) {
                $counter++; // Incrementa el contador en cada iteración

                $trans = Colpensione::create([
                    'cedula' => $cedula,
                    'id_link' => $link_busqueda->id,
                    
                ]);

                VerificacionesColpensione::create([
                    'cedula' => $cedula,
                    'verificacion' => ' ',
                    'id_colpensiones' => $trans->id,
                    'verificado' => '0',
                ]);
            }
        }
        

        return view('colpensione.index', compact('colpensiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $colpensione = new Colpensione();

        return view('colpensione.create', compact('colpensione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColpensioneRequest $request): RedirectResponse
    {
        Colpensione::create($request->validated());

        return Redirect::route('colpensiones.index')
            ->with('success', 'Colpensione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $colpensione = Colpensione::find($id);

        return view('colpensione.show', compact('colpensione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $colpensione = Colpensione::find($id);

        return view('colpensione.edit', compact('colpensione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColpensioneRequest $request, Colpensione $colpensione): RedirectResponse
    {
        $colpensione->update($request->validated());

        return Redirect::route('colpensiones.index')
            ->with('success', 'Colpensione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Colpensione::find($id)->delete();

        return Redirect::route('colpensiones.index')
            ->with('success', 'Colpensione deleted successfully');
    }
}
