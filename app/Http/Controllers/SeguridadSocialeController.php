<?php

namespace App\Http\Controllers;

use App\Models\SeguridadSociale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SeguridadSocialeRequest;
use App\Models\Busqueda;
use App\Models\Link;
use App\Models\VerificacionesSeguridadSociale;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SeguridadSocialeController extends Controller
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
        $id_modulo = '3';
        $link_busquedas = Link::where('id_modulo', $id_modulo)->get();
        
        $seguridadSociales = SeguridadSociale::where('cedula', $cedula)
        ->with('VerificacionesSeguridadSocial','link','modulo')
        ->get();
        $counter = 0; // Inicializa el contador

        // Si no hay registros en transitos, crear nuevos registros
        if ($seguridadSociales->isEmpty()) {
            foreach ($link_busquedas as $link_busqueda) {
                $counter++; // Incrementa el contador en cada iteración

                $trans = SeguridadSociale::create([
                    'cedula' => $cedula,
                    'id_link' => $link_busqueda->id,
                    
                ]);

                VerificacionesSeguridadSociale::create([
                    'cedula' => $cedula,
                    'verificacion' => ' ',
                    'id_seguridad_social' => $trans->id,
                    'verificado' => '0',
                ]);
            }
        }
        return view('seguridad-sociale.index', compact('seguridadSociales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $seguridadSociale = new SeguridadSociale();

        return view('seguridad-sociale.create', compact('seguridadSociale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeguridadSocialeRequest $request): RedirectResponse
    {
        SeguridadSociale::create($request->validated());

        return Redirect::route('seguridad-sociales.index')
            ->with('success', 'SeguridadSociale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $seguridadSociale = SeguridadSociale::find($id);

        return view('seguridad-sociale.show', compact('seguridadSociale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $seguridadSociale = SeguridadSociale::find($id);

        return view('seguridad-sociale.edit', compact('seguridadSociale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeguridadSocialeRequest $request, SeguridadSociale $seguridadSociale): RedirectResponse
    {
        $seguridadSociale->update($request->validated());

        return Redirect::route('seguridad-sociales.index')
            ->with('success', 'SeguridadSociale updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        SeguridadSociale::find($id)->delete();

        return Redirect::route('seguridad-sociales.index')
            ->with('success', 'SeguridadSociale deleted successfully');
    }
}
