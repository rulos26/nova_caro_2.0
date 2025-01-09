<?php

namespace App\Http\Controllers;

use App\Models\Otro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OtroRequest;
use App\Models\Busqueda;
use App\Models\Link;
use App\Models\VerificacionesOtro;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OtroController extends Controller
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

        $id_modulo = '10'; 
        $link_busquedas = Link::where('id_modulo', $id_modulo)->get();

        $otros = Otro::where('cedula', $cedula)
        ->with('VerificacionesOtros','link','modulo')
        ->get();
//dd($registradurias);
        $counter = 0; // Inicializa el contador

        // Si no hay registros en transitos, crear nuevos registros
        if ($otros->isEmpty()) {
            foreach ($link_busquedas as $link_busqueda) {
                $counter++; // Incrementa el contador en cada iteración

                $trans = Otro::create([
                    'cedula' => $cedula,
                    'id_link' => $link_busqueda->id,
                    
                ]);

                VerificacionesOtro::create([ 
                    'cedula' => $cedula,
                    'verificacion' => ' ',
                    'id_otros' => $trans->id,
                    'verificado' => '0',
                ]);
            }
        }

        return view('otro.index', compact('otros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $otro = new Otro();

        return view('otro.create', compact('otro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OtroRequest $request): RedirectResponse
    {
        Otro::create($request->validated());

        return Redirect::route('otros.index')
            ->with('success', 'Otro created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $otro = Otro::find($id);

        return view('otro.show', compact('otro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $otro = Otro::find($id);

        return view('otro.edit', compact('otro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OtroRequest $request, Otro $otro): RedirectResponse
    {
        $otro->update($request->validated());

        return Redirect::route('otros.index')
            ->with('success', 'Otro updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Otro::find($id)->delete();

        return Redirect::route('otros.index')
            ->with('success', 'Otro deleted successfully');
    }
}
