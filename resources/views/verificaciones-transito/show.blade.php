@extends('adminlte::page')

@section('template_title')
    {{ $verificacionesTransito->name ?? __('Show') . " " . __('Verificaciones Transito') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Verificaciones Transito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('verificaciones-transitos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $verificacionesTransito->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion:</strong>
                                    {{ $verificacionesTransito->verificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Transito:</strong>
                                    {{ $verificacionesTransito->id_transito }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificado:</strong>
                                    {{ $verificacionesTransito->verificado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('sidebar.right-sidebar')