@extends('adminlte::page')

@section('template_title')
    {{ $numeroVerificacione->name ?? __('Show') . " " . __('Numero Verificacione') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Numero Verificacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('numero-verificaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $numeroVerificacione->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cuenta:</strong>
                                    {{ $numeroVerificacione->cuenta }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
