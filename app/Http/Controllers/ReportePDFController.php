<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerificacionAutorizacioneRequest;
use App\Models\Aspirante;
use App\Models\Autorizacione;
use App\Models\CamaraComercio;
use App\Models\CartaAutorizacione;
use App\Models\CartasImagene;
use App\Models\ComposicionFamiliare;
use App\Models\Evaluado;
use App\Models\FiltrosPdf;
use App\Models\Firma;
use App\Models\Foto;
use App\Models\InformacionPareja;
use App\Models\InventarioEnsere;
use App\Models\Municipio;
use App\Models\Patrimonio;
use App\Models\Salud;
use App\Models\Sectore;
use App\Models\ServiciosPublico;
use App\Models\TipoDocumento;
use App\Models\Ubicacione;
use App\Models\User;
use App\Models\VerificacionAutorizacione;
use App\Models\Vivienda;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManagerStatic as Image;
use Imagick;


class ReportePDFController extends Controller
{
    public function CartaReporte()
    {

        $cedula = session('cedula');
        $img_firma = session('imagePaths');

        if ($img_firma instanceof \Illuminate\Support\Collection) {
            $img_firma = $img_firma->toArray();
        }
        if (is_array($img_firma)) {
            $img_firma = implode(',', $img_firma);
        }
        $img_firma = ltrim($img_firma, '/');

        // Crear o actualizar la firma
        Firma::updateOrCreate(
            ['cedula' => $cedula],
            ['imagen' => $img_firma]
        );
        CartaAutorizacione::updateOrCreate(
            ['cedula' => $cedula],
            ['firmado' => '1']
        );

        $aspirantes = Aspirante::where('cedula', $cedula)->with(['ciudad', 'lugar_expedicion', 'municipio'])->get();
        $firma = Firma::where('cedula', $cedula)->get();

        if ($aspirantes) {
            $aspirantesArray = $aspirantes->toArray();
        } else {
            $aspirantesArray = [];
        }

        if ($firma) {
            $firmaArray = $firma->toArray();
        } else {
            $firmaArray = [];
        }

        $data = compact('aspirantesArray', 'firmaArray');

        $pdf = PDF::loadView('reportes.carta.temple', $data);
        $pdfPath = storage_path('app/public/pdf_temp.pdf');
        $pdf->save($pdfPath);

        $directory = storage_path('app/public/images/' . $cedula . '/imagen_carta');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        
        $imagePath = storage_path('app/public/images/' . $cedula . '/imagen_carta/temp_image.png');
        $dir = 'storage/images/' . $cedula . '/imagen_carta/temp_image.png';
        try {
            $imagick = new Imagick();
            $imagick->setResolution(300, 300);
            $imagick->readImage($pdfPath);
            $imagick->setImageFormat('png');
            $imagick->writeImage($imagePath);
            $imagick->clear();
            $imagick->destroy();
            CartasImagene::updateOrCreate(
                ['cedula' => $cedula],
                ['imagen' => $dir]
            );
        } catch (\Exception $e) {
            throw new \Exception("Error converting PDF to image: " . $e->getMessage());
        }

        return $pdf->stream('invoice.pdf');
    }

    public function  EvaluadoReporte()
    {
        $cedula = session('cedula');
        /* $cedula = session('cedula');
        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('verificaciones.create');
        } */

        //dd($vivienda) ;
        $filtro_pdf = FiltrosPdf::all();
        $carta=CartasImagene::where('cedula', $cedula)->get();
        if ($filtro_pdf) {
            $filtro_pdfArray = $filtro_pdf->toArray();
        }
        if ($carta) {
            $cartaArray=$carta->toArray();
        } 
        
        $filtro_transito = null;
        $filtro_registraduria = null;
        $filtro_seguridad_social = null;
        $filtro_antecedentes = null;
        $filtro_colpensiones = null;
        $filtro_seguridad = null;
        $filtro_ugpp = null;
        $filtro_negocios = null;
        $filtro_credito = null;
        $filtro_otros = null;
        $filtro_datos_aspirante = null;
        $filtro_informacion_laboral = null;
        $filtro_informacion_academica = null;
        $filtro_foto_perfil = null;
        $filtro_carta_autorizacion = null;

        if ($filtro_pdf) {
            foreach ($filtro_pdf as $item) {
                $nombre_modulo = $item->nombre_modulo;
                $visible = $item->visible;

                switch ($nombre_modulo) {
                    case 'Tránsito':
                        $filtro_transito = $visible;
                        break;
                    case 'Registraduría':
                        $filtro_registraduria = $visible;
                        break;
                    case 'Seguridad Social':
                        $filtro_seguridad_social = $visible;
                        break;
                    case 'Antecedentes':
                        $filtro_antecedentes = $visible;
                        break;
                    case 'Colpensiones':
                        $filtro_colpensiones = $visible;
                        break;
                    case 'Seguridad':
                        $filtro_seguridad = $visible;
                        break;
                    case 'UGPP':
                        $filtro_ugpp = $visible;
                        break;
                    case 'Negocios':
                        $filtro_negocios = $visible;
                        break;
                    case 'Crédito':
                        $filtro_credito = $visible;
                        break;
                    case 'Otros':
                        $filtro_otros = $visible;
                        break;
                    case 'Datos Aspirante':
                        $filtro_datos_aspirante = $visible;
                        break;
                    case 'Información Laboral':
                        $filtro_informacion_laboral = $visible;
                        break;
                    case 'Información Académica':
                        $filtro_informacion_academica = $visible;
                        break;
                    case 'Foto Perfil':
                        $filtro_foto_perfil = $visible;
                        break;
                    case 'Carta Autorizaciòn':
                        $filtro_carta_autorizacion = $visible;
                        break;

                    default:

                        break;
                }
            }
        }
        //dd( $filtro_transito,$filtro_pdf, $filtro_pdfArray);
        $hola = '';
        $data = compact(
            'hola',
            'filtro_datos_aspirante',
            'filtro_informacion_laboral',
            'filtro_informacion_academica',
            'filtro_foto_perfil',
            'filtro_transito',
            'filtro_registraduria',
            'filtro_seguridad_social',
            'filtro_antecedentes',
            'filtro_colpensiones',
            'filtro_seguridad',
            'filtro_ugpp',
            'filtro_negocios',
            'filtro_credito',
            'filtro_otros',
            'filtro_carta_autorizacion',
            'cartaArray',


        );
        // Generar el PDF
        $pdf = PDF::loadView('reportes.evaluado.temple', $data);

        // Retornar el PDF para su visualización en el navegador
        return $pdf->stream('invoice.pdf');
    }
}
