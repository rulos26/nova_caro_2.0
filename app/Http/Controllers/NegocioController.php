<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NegocioRequest;
use App\Models\Busqueda;
use App\Models\Link;
use App\Models\VerificacionesNegocio;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NegocioController extends Controller
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

        $id_modulo = '8'; 
        $link_busquedas = Link::where('id_modulo', $id_modulo)->get();
        $negocios = Negocio::where('cedula', $cedula)
        ->with('VerificacionesNegocio','link','modulo')
        ->get();
//dd($registradurias);
        $counter = 0; // Inicializa el contador

        // Si no hay registros en transitos, crear nuevos registros
        if ($negocios->isEmpty()) {
            foreach ($link_busquedas as $link_busqueda) {
                $counter++; // Incrementa el contador en cada iteración

                $trans = Negocio::create([
                    'cedula' => $cedula,
                    'id_link' => $link_busqueda->id,
                    
                ]);

                VerificacionesNegocio::create([ 
                    'cedula' => $cedula,
                    'verificacion' => ' ',
                    'id_negocios' => $trans->id,
                    'verificado' => '0',
                ]);
            }
        }

        return view('negocio.index', compact('negocios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $negocio = new Negocio();

        return view('negocio.create', compact('negocio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NegocioRequest $request): RedirectResponse
    {
        Negocio::create($request->validated());

        return Redirect::route('negocios.index')
            ->with('success', 'Negocio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $negocio = Negocio::find($id);

        return view('negocio.show', compact('negocio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $negocio = Negocio::find($id);

        return view('negocio.edit', compact('negocio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NegocioRequest $request, Negocio $negocio): RedirectResponse
    {
        $negocio->update($request->validated());

        return Redirect::route('negocios.index')
            ->with('success', 'Negocio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Negocio::find($id)->delete();

        return Redirect::route('negocios.index')
            ->with('success', 'Negocio deleted successfully');
    }
}
