<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antecedente;
use App\Models\Aspirante;
use App\Models\Busqueda;
use App\Models\CartaAutorizacion;
use App\Models\CartaAutorizacione;
use App\Models\Colpensione;
use App\Models\Colpensiones;
use App\Models\Credito;
use App\Models\Firma;
use App\Models\InformacionAcademica;
use App\Models\InformacionesAcademica;
use App\Models\InformacionLaboral;
use App\Models\InformacionLaborale;
use App\Models\Informe;
use App\Models\Municipio;
use App\Models\Negocio;
use App\Models\NotificacionesChecklist;
use App\Models\ObservacionChecklist;
use App\Models\ObservacionesChecklist;
use App\Models\ObservacionesChecklists;
use App\Models\Otro;
use App\Models\Photo;
use App\Models\Registraduria;
use App\Models\Seguridad;
use App\Models\Seguridade;
use App\Models\SeguridadSocial;
use App\Models\SeguridadSociale;
use App\Models\Transito;
use App\Models\Ugp;
use App\Models\Ugpp;
use App\Models\VerificacionAcademica;
use App\Models\VerificacionAntecedente;
use App\Models\VerificacionColpensiones;
use App\Models\VerificacionCredito;
use App\Models\VerificacionesAcademica;
use App\Models\VerificacionesAntecedente;
use App\Models\VerificacionesColpensione;
use App\Models\VerificacionesCredito;
use App\Models\VerificacionesLaborale;
use App\Models\VerificacionesNegocio;
use App\Models\VerificacionesOtro;
use App\Models\VerificacionesRegistraduria;
use App\Models\VerificacionesSeguridade;
use App\Models\VerificacionesSeguridadSociale;
use App\Models\VerificacionesTransito;
use App\Models\VerificacionesUgpp;
use App\Models\VerificacionLaboral;
use App\Models\VerificacionNegocio;
use App\Models\VerificacionOtro;
use App\Models\VerificacionRegistraduria;
use App\Models\VerificacionSeguridad;
use App\Models\VerificacionSeguridadSocial;
use App\Models\VerificacionTransito;
use App\Models\VerificacionUgp;

class ChecklistController extends Controller
{


    public function index()
    {
        $cedula = session('cedula');
        // Verificar si la variable está vacía
        if (empty($cedula)) {
            $busqueda = new Busqueda();

            return view('busqueda.create', compact('busqueda'));
        }
        // Consulta la existencia de datos en cada tabla
        $tables = [
            'aspirantes' => Aspirante::where('cedula', $cedula)->exists(),
            'carta_autorizaciones' => CartaAutorizacione::where('cedula', $cedula)->exists(),
            'informaciones_academicas' => InformacionesAcademica::where('cedula', $cedula)->exists(),
            'informacion_laborales' => InformacionLaborale::where('cedula', $cedula)->exists(),
            'photos' => Photo::where('cedula', $cedula)->exists(),
            'academicas' => VerificacionesAcademica::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesAcademica::where('cedula', $cedula)->count(),
            'antecedentes' => VerificacionesAntecedente::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesAntecedente::where('cedula', $cedula)->count(),
            'colpensiones' => VerificacionesColpensione::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesColpensione::where('cedula', $cedula)->count(),
            'creditos' => VerificacionesCredito::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesCredito::where('cedula', $cedula)->count(),
            'laborales' => VerificacionesLaborale::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesLaborale::where('cedula', $cedula)->count(),
            'negocios' => VerificacionesNegocio::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesNegocio::where('cedula', $cedula)->count(),
            'otros' => VerificacionesOtro::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesOtro::where('cedula', $cedula)->count(),
            'registradurias' => VerificacionesRegistraduria::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesRegistraduria::where('cedula', $cedula)->count(),
            'seguridades' => VerificacionesSeguridade::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesSeguridade::where('cedula', $cedula)->count(),
            'seguridad_sociales' => VerificacionesSeguridadSociale::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesSeguridadSociale::where('cedula', $cedula)->count(),
            'transitos' => VerificacionesTransito::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesTransito::where('cedula', $cedula)->count(),
            'ugpps' => VerificacionesUgpp::where('cedula', $cedula)->where('verificado', 1)->count() == VerificacionesUgpp::where('cedula', $cedula)->count(),
        ];

        // Verifica si todos los módulos tienen datos completos y verificados
        $allCompleted = !in_array(false, $tables);
        $observa_exist = ObservacionesChecklist::where('cedula', $cedula)->get();
        //dd($observa_exist); 
        if ($observa_exist->isEmpty()) {
            $revision = 0; // esta vacia  se pèude crear  el resgistro
        } else {
            $revision = 1; // esta esta lleno no se pèude crear  el resgistro
        }
        return view('checklist.index', [
            'tables' => $tables,
            'allCompleted' => $allCompleted,
            'revision' => $revision,
        ])->with('success', 'Aspirante created successfully.');
    }


    public function submitChecklist(Request $request)
    {
        $cedula = session('cedula');
        // Verificar si la variable está vacía
        if (empty($cedula)) {
            $busqueda = new Busqueda();

            return view('busqueda.create', compact('busqueda'));
        }

        return view('checklist.submit', ['cedula' => $cedula]);
    }

    public function informAdmin(Request $request)
    {
        $request->validate([
            'cedula' => 'required',
            'observaciones' => 'required',
        ]);

        ObservacionesChecklist::updateOrCreate([
            'cedula' => $request->cedula,
            'observaciones' => $request->observaciones,
        ]);

        NotificacionesChecklist::updateOrCreate([
            'cedula' => $request->cedula,
            'nueva' => '1',
        ]);

        return redirect()->route('home')->with('success', 'La información ha sido enviada al administrador.');
    }

    public function checklistAdmin($cedula)
    {
        // Cargar todas las relaciones necesarias de una vez
        $aspirante = Aspirante::where('cedula', $cedula)->first();
        $cartaAutorizacion = CartaAutorizacione::where('cedula', $cedula)->first();
        $informacionesAcademicas = InformacionesAcademica::where('cedula', $cedula)->get();
        $informacionesLaborales = InformacionLaborale::where('cedula', $cedula)->get();
        $photo = Photo::where('cedula', $cedula)->first();
        $antecedentes = Antecedente::where('cedula', $cedula)->with('link')->get();
        $colpensiones = Colpensione::where('cedula', $cedula)->with('link')->get();
        $creditos = Credito::where('cedula', $cedula)->with('link')->get();
        $negocios = Negocio::where('cedula', $cedula)->with('link')->get();
        $otros = Otro::where('cedula', $cedula)->with('link')->get();
        $registradurias = Registraduria::where('cedula', $cedula)->with('link')->get();
        $seguridades = Seguridade::where('cedula', $cedula)->with('link')->get();
        $seguridadSociales = SeguridadSociale::where('cedula', $cedula)->with('link')->get();
        $transitos = Transito::where('cedula', $cedula)->with('link')->get();
        $ugpps = Ugpp::where('cedula', $cedula)->with('link')->get();

        return view('checklist.checklis_admin', compact(
            'aspirante',
            'cartaAutorizacion',
            'informacionesAcademicas',
            'informacionesLaborales',
            'photo',
            'antecedentes',
            'colpensiones',
            'creditos',
            'negocios',
            'otros',
            'registradurias',
            'seguridades',
            'seguridadSociales',
            'transitos',
            'ugpps'
        ));
    }
}
