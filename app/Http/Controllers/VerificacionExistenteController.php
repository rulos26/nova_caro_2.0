<?php

namespace App\Http\Controllers;

use App\Models\Aspirante;
use App\Models\CamaraComercio;
use App\Models\ComposicionFamiliare;
use App\Models\Evaluado;
use App\Models\InformacionesAcademica;
use App\Models\InformacionLaborale;
use App\Models\InformacionPareja;
use App\Models\InventarioEnsere;
use App\Models\Patrimonio;
use App\Models\Salud;
use App\Models\ServiciosPublico;
use App\Models\VerificacionAutorizacione;
use App\Models\Vivienda;
use Illuminate\Http\Request;

class VerificacionExistenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        $verificacion_aspirante = Aspirante::where('cedula', $cedula)->first();
        $verificacion_laboral = InformacionLaborale::where('cedula', $cedula)->first();
        $verificacion_academica = InformacionesAcademica::where('cedula', $cedula)->first();
        if ($verificacion_academica === null) {
            $academica_master =0;
        } else {
            $academica_master =1;
        }

        if ($verificacion_aspirante === null) {
            $aspirante_master = 0;
        } else {
            $aspirante_master = 1;
        }
        if ($verificacion_laboral === null) {
            $laboral_master = 0;
        } else {
            $laboral_master = 1;
        }


        //dd($cedula,$verificacion_autorizacion,$autorizacion_master);
        return view(
            'verificacione-existente.index',
            compact(
                'aspirante_master',
                'laboral_master',
                'academica_master',


            )
        );
        return view(
            'verificacione-existente.index',
            compact(
                'aspirante_master',
                'laboral_master',
                'academica_master',


            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view(
            'verificacione-existente.table_verificacion'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        
    }

    public function create2(){
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view(
            'verificacione-existente.colors'
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
