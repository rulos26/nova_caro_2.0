@extends('adminlte::page')

@section('template_title')
    {{ $verificacionesAcademica->name ?? __('Show') . " " . __('Verificaciones Academica') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Verificaciones Academica</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('verificaciones-academicas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $verificacionesAcademica->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion:</strong>
                                    {{ $verificacionesAcademica->verificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Academica:</strong>
                                    {{ $verificacionesAcademica->id_academica }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificado:</strong>
                                    {{ $verificacionesAcademica->verificado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
