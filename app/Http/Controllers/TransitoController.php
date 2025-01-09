<?php

namespace App\Http\Controllers;

use App\Models\Transito;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TransitoRequest;
use App\Models\Busqueda;
use App\Models\Link;
use App\Models\VerificacionesTransito;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TransitoController extends Controller
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

        $id_modulo = '1';
        $link_busquedas = Link::where('id_modulo', $id_modulo)->get();

        $transitos = Transito::where('cedula', $cedula)
        ->with('verificacionesTransito','link','modulo')
        ->get();

        $counter = 0; // Inicializa el contador

        // Si no hay registros en transitos, crear nuevos registros
        if ($transitos->isEmpty()) {
            foreach ($link_busquedas as $link_busqueda) {
                $counter++; // Incrementa el contador en cada iteración

                $trans = Transito::create([
                    'cedula' => $cedula,
                    'id_link' => $link_busqueda->id,
                    'verificado' => '0',
                ]);

                VerificacionesTransito::create([
                    'cedula' => $cedula,
                    'verificacion' => ' ',
                    'id_transito' => $trans->id,
                    'verificado' => '0',
                ]);
            }
        }
        //dd($counter,$transitos);
        // Mostrar la vista transito.index con los registros de transitos y el contador
        return view('transito.index', compact('transitos', 'counter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $transito = new Transito();

        return view('transito.create', compact('transito'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransitoRequest $request): RedirectResponse
    {
        Transito::create($request->validated());

        return Redirect::route('transitos.index')
            ->with('success', 'Transito created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $transito = Transito::find($id);

        return view('transito.show', compact('transito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $transito = Transito::find($id);

        return view('transito.edit', compact('transito'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransitoRequest $request, Transito $transito): RedirectResponse
    {
        $transito->update($request->validated());

        return Redirect::route('transitos.index')
            ->with('success', 'Transito updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Transito::find($id)->delete();

        return Redirect::route('transitos.index')
            ->with('success', 'Transito deleted successfully');
    }
}
