@extends('adminlte::page')

@section('template_title')
    {{ $verificacionesOtro->name ?? __('Show') . " " . __('Verificaciones Otro') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Verificaciones Otro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('verificaciones-otros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $verificacionesOtro->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion:</strong>
                                    {{ $verificacionesOtro->verificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Otros:</strong>
                                    {{ $verificacionesOtro->id_otros }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificado:</strong>
                                    {{ $verificacionesOtro->verificado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
