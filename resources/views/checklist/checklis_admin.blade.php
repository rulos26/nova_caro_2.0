@extends('adminlte::page')

@section('title', 'Checklist')

@section('content_header')
<h1>Evaluador de Módulos</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Módulos</h3>
    </div>
    <div class="card-body">
        <div id="accordion">

            <!-- Acordeón para Aspirantes -->
            <div class="card">
                <div class="card-header" id="headingOne" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne"
                            style="background-color: brown; color:white">
                            Aspirantes
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($aspirantes as $aspirante) --}}
                                <tr>
                                    <td>Aspirantes</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('aspirantes.show', $aspirante) }}"><i
                                                class="fa fa-fw fa-eye"></i> {{ __('ver') }}</a>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Carta Autorizaciones -->
            <div class="card">
                <div class="card-header" id="headingTwo" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo"
                            style="background-color: brown; color:white">
                            Carta Autorizaciones
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Carta Autorizaciones</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('carta-autorizaciones.show', $cartaAutorizacion) }}"><i
                                                class="fa fa-fw fa-eye"></i> {{ __('ver') }}</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Informaciones Académicas -->
            <div class="card">
                <div class="card-header" id="headingThree" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="false" aria-controls="collapseThree"
                            style="background-color: brown; color:white">
                            Informaciones Académicas
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($informacionesAcademicas as $informacionesAcademica)
                                <tr>
                                    <td>Informaciones Académicas</td>
                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('informaciones-academicas.show', $informacionesAcademica->id) }}"><i
                                                class="fa fa-fw fa-eye"></i> {{ __('ver') }}</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Información Laborales -->
            <div class="card">
                <div class="card-header" id="headingFour" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                            aria-expanded="false" aria-controls="collapseFour"
                            style="background-color: brown; color:white">
                            Información Laborales
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($informacionesLaborales as $informacionLaborale)
                                <tr>
                                    <td>Información Laborales</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('informacion-laborales.show', $informacionLaborale->id) }}"><i
                                                class="fa fa-fw fa-eye"></i> {{ __('ver') }}</a>

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Photos -->
            <div class="card">
                <div class="card-header" id="headingFive" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
                            aria-expanded="false" aria-controls="collapseFive"
                            style="background-color: brown; color:white">
                            Photos
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>Photos</td>

                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('photos.show', $photo) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Acordeón para Antecedentes -->
            <div class="card">
                <div class="card-header" id="headingSeven" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven"
                            aria-expanded="false" aria-controls="collapseSeven"
                            style="background-color: brown; color:white">
                            Antecedentes
                        </button>
                    </h5>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($antecedentes as $data)
                                <tr>
                                    <td>{{$data->link->nombre}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('verificaciones-antecedentes.show', $data->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Colpensiones -->
            <div class="card">
                <div class="card-header" id="headingEight" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight"
                            aria-expanded="false" aria-controls="collapseEight"
                            style="background-color: brown; color:white">
                            Colpensiones
                        </button>
                    </h5>
                </div>
                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($colpensiones as $data)
                                <tr>
                                    <td>{{$data->link->nombre}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('verificaciones-colpensiones.show', $data->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Creditos -->
            <div class="card">
                <div class="card-header" id="headingNine" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine"
                            aria-expanded="false" aria-controls="collapseNine"
                            style="background-color: brown; color:white">
                            Creditos
                        </button>
                    </h5>
                </div>
                <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($creditos as $data)
                                <tr>
                                    <td>{{$data->link->nombre}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('verificaciones-creditos.show', $data->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Acordeón para Negocios -->
            <div class="card">
                <div class="card-header" id="headingEleven" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven"
                            aria-expanded="false" aria-controls="collapseEleven"
                            style="background-color: brown; color:white">
                            Negocios
                        </button>
                    </h5>
                </div>
                <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($negocios as $data)
                                <tr>
                                    <td>{{$data->link->nombre}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('verificaciones-negocios.show', $data->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Otros -->
            <div class="card">
                <div class="card-header" id="headingTwelve" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwelve"
                            aria-expanded="false" aria-controls="collapseTwelve"
                            style="background-color: brown; color:white">
                            Otros
                        </button>
                    </h5>
                </div>
                <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($otros as $data)
                                <tr>
                                    <td>{{$data->link->nombre}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('verificaciones-otros.show', $data->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Registradurías -->
            <div class="card">
                <div class="card-header" id="headingThirteen" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThirteen"
                            aria-expanded="false" aria-controls="collapseThirteen"
                            style="background-color: brown; color:white">
                            Registradurías
                        </button>
                    </h5>
                </div>
                <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registradurias as $data)
                                <tr>
                                    <td>{{$data->link->nombre}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('verificaciones-registradurias.show', $data->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Seguridades -->
            <div class="card">
                <div class="card-header" id="headingFourteen" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFourteen"
                            aria-expanded="false" aria-controls="collapseFourteen"
                            style="background-color: brown; color:white">
                            Seguridades
                        </button>
                    </h5>
                </div>
                <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($seguridades as $data)
                                <tr>
                                    <td>{{$data->link->nombre}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('verificaciones-seguridades.show', $data->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Seguridad Sociales -->
            <div class="card">
                <div class="card-header" id="headingFifteen" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFifteen"
                            aria-expanded="false" aria-controls="collapseFifteen" style="background-color: brown; color:white">
                            Seguridad Sociales
                        </button>
                    </h5>
                </div>
                <div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($seguridadSociales as $data)
                                <tr>
                                    <td>{{$data->link->nombre}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('verificaciones-seguridad-sociales.show', $data->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Tránsito -->
            <div class="card">
                <div class="card-header" id="headingSixteen" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSixteen"
                            aria-expanded="false" aria-controls="collapseSixteen"
                            style="background-color: brown; color:white">
                            Tránsito
                        </button>
                    </h5>
                </div>
                <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transitos as $data)
                                <tr>
                                    <td>{{$data->link->nombre}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('verificaciones-transitos.show', $data->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Acordeón para UGPPs -->
            <div class="card">
                <div class="card-header" id="headingSixteen" style="background-color: brown; color:white">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSixteen"
                            aria-expanded="false" aria-controls="collapseSixteen"
                            style="background-color: brown; color:white">
                            UGPPs
                        </button>
                    </h5>
                </div>
                <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Módulo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ugpps as $data)
                                <tr>
                                    <td>{{$data->link->nombre}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('verificaciones-ugpps.show', $data->id) }}">
                                            <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
    @endsection