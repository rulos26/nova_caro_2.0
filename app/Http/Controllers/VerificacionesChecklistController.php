<?php

namespace App\Http\Controllers;

use App\Models\VerificacionesChecklist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VerificacionesChecklistRequest;
use App\Models\Aspirante;
use App\Models\Busqueda;
use App\Models\Informe;
use App\Models\NotificacionesChecklist;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VerificacionesChecklistController extends Controller
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
         // Actualizar los registros con 'nuevo' igual a 1 y cambiar su valor a 0
         NotificacionesChecklist::where('nueva', 1)->update(['nueva' => 0]);

          // Obtén los aspirantes por cédula
        $aspirantes = Aspirante::where('cedula', $cedula)->with(['ciudad', 'lugar_expedicion', 'municipio'])->get();
        $informe= Informe::where('cedula', $cedula)->with(['users'])->get();
        
        return view('verificaciones-checklist.index', compact('aspirantes','informe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $verificacionesChecklist = new VerificacionesChecklist();

        return view('verificaciones-checklist.create', compact('verificacionesChecklist'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificacionesChecklistRequest $request): RedirectResponse
    {
        VerificacionesChecklist::create($request->validated());

        return Redirect::route('verificaciones-checklists.index')
            ->with('success', 'VerificacionesChecklist created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $verificacionesChecklist = VerificacionesChecklist::find($id);

        return view('verificaciones-checklist.show', compact('verificacionesChecklist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $verificacionesChecklist = VerificacionesChecklist::find($id);

        return view('verificaciones-checklist.edit', compact('verificacionesChecklist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificacionesChecklistRequest $request, VerificacionesChecklist $verificacionesChecklist): RedirectResponse
    {
        $verificacionesChecklist->update($request->validated());

        return Redirect::route('verificaciones-checklists.index')
            ->with('success', 'VerificacionesChecklist updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VerificacionesChecklist::find($id)->delete();

        return Redirect::route('verificaciones-checklists.index')
            ->with('success', 'VerificacionesChecklist deleted successfully');
    }
}
