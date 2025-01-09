<?php

namespace App\Http\Controllers;

use App\Models\Seguridade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SeguridadeRequest;
use App\Models\Busqueda;
use App\Models\Link;
use App\Models\VerificacionesSeguridade;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SeguridadeController extends Controller
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
        
        $id_modulo = '6';
        $link_busquedas = Link::where('id_modulo', $id_modulo)->get();
        
        $seguridades = Seguridade::where('cedula', $cedula)
        ->with('VerificacionesSeguridades','link','modulo')
        ->get();
        $counter = 0; // Inicializa el contador

        // Si no hay registros en transitos, crear nuevos registros
        if ($seguridades->isEmpty()) {
            foreach ($link_busquedas as $link_busqueda) {
                $counter++; // Incrementa el contador en cada iteración

                $trans = Seguridade::create([
                    'cedula' => $cedula,
                    'id_link' => $link_busqueda->id,
                    
                ]);

                VerificacionesSeguridade::create([
                    'cedula' => $cedula,
                    'verificacion' => ' ',
                    'id_seguridad' => $trans->id,
                    'verificado' => '0',
                ]);
            }
        }

        return view('seguridade.index', compact('seguridades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $seguridade = new Seguridade();

        return view('seguridade.create', compact('seguridade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeguridadeRequest $request): RedirectResponse
    {
        Seguridade::create($request->validated());

        return Redirect::route('seguridades.index')
            ->with('success', 'Seguridade created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $seguridade = Seguridade::find($id);

        return view('seguridade.show', compact('seguridade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $seguridade = Seguridade::find($id);

        return view('seguridade.edit', compact('seguridade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeguridadeRequest $request, Seguridade $seguridade): RedirectResponse
    {
        $seguridade->update($request->validated());

        return Redirect::route('seguridades.index')
            ->with('success', 'Seguridade updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Seguridade::find($id)->delete();

        return Redirect::route('seguridades.index')
            ->with('success', 'Seguridade deleted successfully');
    }
}
