@extends('adminlte::page')

@section('template_title')
    {{ $informacionLaborale->name ?? __('Show') . " " . __('Informacion Laborale') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Informacion Laborale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('informacion-laborales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $informacionLaborale->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Compania:</strong>
                                    {{ $informacionLaborale->compania }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cargo:</strong>
                                    {{ $informacionLaborale->cargo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ingreso:</strong>
                                    {{ $informacionLaborale->ingreso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Retiro:</strong>
                                    {{ $informacionLaborale->retiro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $informacionLaborale->telefono }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
