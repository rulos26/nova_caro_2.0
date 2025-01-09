@extends('adminlte::page')

@section('template_title')
    {{ $verificacionesCredito->name ?? __('Show') . " " . __('Verificaciones Credito') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Verificaciones Credito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('verificaciones-creditos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $verificacionesCredito->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion:</strong>
                                    {{ $verificacionesCredito->verificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Creditos:</strong>
                                    {{ $verificacionesCredito->id_creditos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificado:</strong>
                                    {{ $verificacionesCredito->verificado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
