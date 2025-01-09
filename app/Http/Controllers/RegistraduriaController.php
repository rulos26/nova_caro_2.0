<?php

namespace App\Http\Controllers;

use App\Models\Registraduria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegistraduriaRequest;
use App\Models\Busqueda;
use App\Models\Link;
use App\Models\VerificacionesRegistraduria;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RegistraduriaController extends Controller
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

        $id_modulo = '2'; 
        $link_busquedas = Link::where('id_modulo', $id_modulo)->get();

        $registradurias = Registraduria::where('cedula', $cedula)
        ->with('VerificacionesRegistraduria','link','modulo')
        ->get();
//dd($registradurias);
        $counter = 0; // Inicializa el contador

        // Si no hay registros en transitos, crear nuevos registros
        if ($registradurias->isEmpty()) {
            foreach ($link_busquedas as $link_busqueda) {
                $counter++; // Incrementa el contador en cada iteración

                $trans = Registraduria::create([
                    'cedula' => $cedula,
                    'id_link' => $link_busqueda->id,
                    
                ]);

                VerificacionesRegistraduria::create([ 
                    'cedula' => $cedula,
                    'verificacion' => ' ',
                    'id_registraduria' => $trans->id,
                    'verificado' => '0',
                ]);
            }
        }
        

        return view('registraduria.index', compact('registradurias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    { 
        $registraduria = new Registraduria();

        return view('registraduria.create', compact('registraduria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistraduriaRequest $request): RedirectResponse
    {
        Registraduria::create($request->validated());

        return Redirect::route('registradurias.index')
            ->with('success', 'Registraduria created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $registraduria = Registraduria::find($id);

        return view('registraduria.show', compact('registraduria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $registraduria = Registraduria::find($id);

        return view('registraduria.edit', compact('registraduria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegistraduriaRequest $request, Registraduria $registraduria): RedirectResponse
    {
        $registraduria->update($request->validated());

        return Redirect::route('registradurias.index')
            ->with('success', 'Registraduria updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Registraduria::find($id)->delete();

        return Redirect::route('registradurias.index')
            ->with('success', 'Registraduria deleted successfully');
    }
}
