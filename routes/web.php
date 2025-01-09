<?php

use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\AspiranteController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\CartaAutorizacioneController;
use App\Http\Controllers\CartasImageneController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ColpensioneController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FiltrosPdfController;
use App\Http\Controllers\FirmaController;
use App\Http\Controllers\InformacionesAcademicaController;
use App\Http\Controllers\InformacionLaboraleController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\moduloVerificaciones;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\NotificacionesChecklistController;
use App\Http\Controllers\NumeroVerificacioneController;
use App\Http\Controllers\ObservacionesChecklistController;
use App\Http\Controllers\OtroController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistraduriaController;
use App\Http\Controllers\ReportePDFController;
use App\Http\Controllers\SeguridadeController;
use App\Http\Controllers\SeguridadSocialeController;
use App\Http\Controllers\TransitoController;
use App\Http\Controllers\UgppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificacionesAcademicaController;
use App\Http\Controllers\VerificacionesAntecedenteController;
use App\Http\Controllers\VerificacionesChecklistController;
use App\Http\Controllers\VerificacionesColpensioneController;
use App\Http\Controllers\VerificacionesCreditoController;
use App\Http\Controllers\VerificacionesLaboraleController;
use App\Http\Controllers\VerificacionesNegocioController;
use App\Http\Controllers\VerificacionesOtroController;
use App\Http\Controllers\VerificacionesRegistraduriaController;
use App\Http\Controllers\VerificacionesSeguridadeController;
use App\Http\Controllers\VerificacionesSeguridadSocialeController;
use App\Http\Controllers\VerificacionesTransitoController;
use App\Http\Controllers\VerificacionesUgppController;
use App\Http\Controllers\VerificacionExistenteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('busqueda.index');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* ruta  para hacer los reportes */

Route::get('reporte/carta', [ReportePDFController::class, 'CartaReporte'])->name('reporte.carta');
Route::get('reporte/evaluado', [ReportePDFController::class, 'EvaluadoReporte'])->name('reporte.evaluado');
/* route tablas relacionadas */
Route::resource('departamentos', DepartamentoController::class);
Route::resource('municipios', MunicipioController::class);
Route::get('modulo/transito', [moduloVerificaciones::class, 'transito'])->name('transito');
Route::get('modulo/registraduria', [moduloVerificaciones::class, 'registraduria'])->name('registraduria');
Route::get('modulo/seguridad-social', [moduloVerificaciones::class, 'seguridadSocial'])->name('seguridad_social');
Route::get('modulo/antecedentes', [moduloVerificaciones::class, 'antecedentes'])->name('antecedentes');
Route::get('modulo/colpensiones', [moduloVerificaciones::class, 'colpensiones'])->name('colpensiones');
Route::get('modulo/seguridad', [moduloVerificaciones::class, 'seguridad'])->name('seguridad');
Route::get('modulo/ugpp', [moduloVerificaciones::class, 'ugpp'])->name('ugpp');
Route::get('modulo/negocios', [moduloVerificaciones::class, 'negocios'])->name('negocios');
Route::get('modulo/credito', [moduloVerificaciones::class, 'credito'])->name('credito');
Route::get('modulo/otros', [moduloVerificaciones::class, 'otros'])->name('otros');
Route::resource('modulos', ModuloController::class);
Route::resource('links', LinkController::class);

/*  rouet tablas principales */
Route::resource('aspirantes', AspiranteController::class);
Route::resource('busquedas', BusquedaController::class);
Route::resource('informes', InformeController::class);
Route::resource('verificacion-existentes', VerificacionExistenteController::class);
Route::resource('verificaciones-laborales', VerificacionesLaboraleController::class);
Route::resource('informacion-laborales', InformacionLaboraleController::class);
Route::resource('verificaciones-academicas', VerificacionesAcademicaController::class);
Route::resource('informaciones-academicas', InformacionesAcademicaController::class);
Route::resource('verificaciones-transitos', VerificacionesTransitoController::class);
Route::resource('transitos', TransitoController::class);
Route::resource('registradurias', RegistraduriaController::class);
Route::resource('verificaciones-registradurias', VerificacionesRegistraduriaController::class);
Route::resource('seguridad-sociales', SeguridadSocialeController::class);
Route::resource('verificaciones-seguridad-sociales', VerificacionesSeguridadSocialeController::class);
Route::resource('verificaciones-antecedentes', VerificacionesAntecedenteController::class);
Route::resource('antecedentes', AntecedenteController::class);
Route::resource('verificaciones-colpensiones', VerificacionesColpensioneController::class);
Route::resource('colpensiones', ColpensioneController::class);
Route::resource('seguridades', SeguridadeController::class);
Route::resource('verificaciones-seguridades', VerificacionesSeguridadeController::class);
Route::resource('verificaciones-ugpps', VerificacionesUgppController::class);
Route::resource('ugpps', UgppController::class);
Route::resource('verificaciones-otros', VerificacionesOtroController::class);
Route::resource('otros', OtroController::class);
Route::resource('verificaciones-creditos', VerificacionesCreditoController::class);
Route::resource('creditos', CreditoController::class);
Route::resource('verificaciones-negocios', VerificacionesNegocioController::class);
Route::resource('negocios', NegocioController::class);
Route::resource('photos', PhotoController::class);
Route::resource('filtros-pdfs', FiltrosPdfController::class);
Route::post('filtros-pdfs/toggleVisible', [FiltrosPdfController::class, 'toggleVisible'])->name('filtros-pdfs.toggleVisible');
Route::resource('users', UserController::class);
Route::resource('firmas', FirmaController::class);
Route::resource('carta-autorizaciones', CartaAutorizacioneController::class);
Route::resource('cartas-imagenes', CartasImageneController::class);
Route::get('/checklist', [ChecklistController::class, 'index'])->name('checklist.index');
Route::get('/checklistAdmin/{cedula}', [ChecklistController::class, 'checklistAdmin'])->name('checklist.admin');
Route::post('/checklist/submit', [ChecklistController::class, 'submitChecklist'])->name('checklist.submit');
Route::post('/checklist/inform', [ChecklistController::class, 'informAdmin'])->name('checklist.inform');
Route::resource('observaciones-checklists', ObservacionesChecklistController::class);
Route::resource('notificaciones-checklists', NotificacionesChecklistController::class);
Route::resource('numero-verificaciones', NumeroVerificacioneController::class);
Route::resource('verificaciones-checklists', VerificacionesChecklistController::class);
/* rutas temporales */
Route::get('verificacion-existentes/', [VerificacionExistenteController::class, 'create2'])->name('verificacion-existentes.create2');
Route::get('verificacion-existentes/', [VerificacionExistenteController::class, 'index'])->name('verificacion-existentes.index');
Route::post('/save-signature', [FirmaController::class, 'store'])->name('firmas.store');
Route::get('firmas/select_firma', [FirmaController::class, 'select_firma'])->name('firmas.select_firma');

});
