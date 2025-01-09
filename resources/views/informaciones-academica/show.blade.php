@extends('adminlte::page')

@section('template_title')
    {{ $informacionesAcademica->name ?? __('Show') . " " . __('Informaciones Academica') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Informaciones Academica</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('informaciones-academicas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $informacionesAcademica->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Institucion:</strong>
                                    {{ $informacionesAcademica->institucion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Titulo Programa:</strong>
                                    {{ $informacionesAcademica->titulo_programa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha De Grado:</strong>
                                    {{ $informacionesAcademica->fecha_de_grado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $informacionesAcademica->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Ciudad Academica:</strong>
                                    {{ $informacionesAcademica->id_ciudad_academica }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
