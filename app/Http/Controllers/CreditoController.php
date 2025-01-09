<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CreditoRequest;
use App\Models\Busqueda;
use App\Models\Link;
use App\Models\VerificacionesCredito;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CreditoController extends Controller
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

        $id_modulo = '9'; 
        $link_busquedas = Link::where('id_modulo', $id_modulo)->get();

        $creditos = Credito::where('cedula', $cedula)
        ->with('VerificacionesCreditos','link','modulo')
        ->get();
//dd($registradurias);
        $counter = 0; // Inicializa el contador

        // Si no hay registros en transitos, crear nuevos registros
        if ($creditos->isEmpty()) {
            foreach ($link_busquedas as $link_busqueda) {
                $counter++; // Incrementa el contador en cada iteración

                $trans = Credito::create([
                    'cedula' => $cedula,
                    'id_link' => $link_busqueda->id,
                    
                ]);

                VerificacionesCredito::create([ 
                    'cedula' => $cedula,
                    'verificacion' => ' ',
                    'id_creditos' => $trans->id,
                    'verificado' => '0',
                ]);
            }
        }
        

        return view('credito.index', compact('creditos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $credito = new Credito();

        return view('credito.create', compact('credito'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreditoRequest $request): RedirectResponse
    {
        Credito::create($request->validated());

        return Redirect::route('creditos.index')
            ->with('success', 'Credito created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $credito = Credito::find($id);

        return view('credito.show', compact('credito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $credito = Credito::find($id);

        return view('credito.edit', compact('credito'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreditoRequest $request, Credito $credito): RedirectResponse
    {
        $credito->update($request->validated());

        return Redirect::route('creditos.index')
            ->with('success', 'Credito updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Credito::find($id)->delete();

        return Redirect::route('creditos.index')
            ->with('success', 'Credito deleted successfully');
    }
}
