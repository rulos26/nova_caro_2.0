<?php

namespace App\Http\Controllers;

use App\Models\Ugpp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UgppRequest;
use App\Models\Busqueda;
use App\Models\Link;
use App\Models\VerificacionesUgpp;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UgppController extends Controller
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
        $id_modulo = '7';
        $link_busquedas = Link::where('id_modulo', $id_modulo)->get();
        $ugpps = Ugpp::where('cedula', $cedula)
            ->with('VerificacionesUgpp', 'link', 'modulo')
            ->get();
        //dd($registradurias);
        $counter = 0; // Inicializa el contador

        // Si no hay registros en transitos, crear nuevos registros
        if ($ugpps->isEmpty()) {
            foreach ($link_busquedas as $link_busqueda) {
                $counter++; // Incrementa el contador en cada iteración

                $trans = Ugpp::create([
                    'cedula' => $cedula,
                    'id_link' => $link_busqueda->id,

                ]);

                VerificacionesUgpp::create([
                    'cedula' => $cedula,
                    'verificacion' => ' ',
                    'id_ugpps' => $trans->id,
                    'verificado' => '0',
                ]);
            }
        }
        return view('ugpp.index', compact('ugpps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ugpp = new Ugpp();

        return view('ugpp.create', compact('ugpp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UgppRequest $request): RedirectResponse
    {
        Ugpp::create($request->validated());

        return Redirect::route('ugpps.index')
            ->with('success', 'Ugpp created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $ugpp = Ugpp::find($id);

        return view('ugpp.show', compact('ugpp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $ugpp = Ugpp::find($id);

        return view('ugpp.edit', compact('ugpp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UgppRequest $request, Ugpp $ugpp): RedirectResponse
    {
        $ugpp->update($request->validated());

        return Redirect::route('ugpps.index')
            ->with('success', 'Ugpp updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Ugpp::find($id)->delete();

        return Redirect::route('ugpps.index')
            ->with('success', 'Ugpp deleted successfully');
    }
}
