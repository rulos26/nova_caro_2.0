@extends('adminlte::page')

@section('template_title')
    {{ $verificacionesLaborale->name ?? __('Show') . " " . __('Verificaciones Laborale') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Verificaciones Laborale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('verificaciones-laborales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $verificacionesLaborale->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion:</strong>
                                    {{ $verificacionesLaborale->verificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Laboral:</strong>
                                    {{ $verificacionesLaborale->id_laboral }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificado:</strong>
                                    {{ $verificacionesLaborale->verificado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
