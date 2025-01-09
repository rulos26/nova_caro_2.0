@extends('adminlte::page')

@section('template_title')
    {{ $verificacionesSeguridadSociale->name ?? __('Show') . " " . __('Verificaciones Seguridad Sociale') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Verificaciones Seguridad Sociale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('verificaciones-seguridad-sociales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $verificacionesSeguridadSociale->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion:</strong>
                                    {{ $verificacionesSeguridadSociale->verificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Seguridad Social:</strong>
                                    {{ $verificacionesSeguridadSociale->id_seguridad_social }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificado:</strong>
                                    {{ $verificacionesSeguridadSociale->verificado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('sidebar.right-sidebar')