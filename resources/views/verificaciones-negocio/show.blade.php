@extends('adminlte::page')

@section('template_title')
    {{ $verificacionesNegocio->name ?? __('Show') . " " . __('Verificaciones Negocio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Verificaciones Negocio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('verificaciones-negocios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $verificacionesNegocio->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion:</strong>
                                    {{ $verificacionesNegocio->verificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Negocios:</strong>
                                    {{ $verificacionesNegocio->id_negocios }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificado:</strong>
                                    {{ $verificacionesNegocio->verificado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
