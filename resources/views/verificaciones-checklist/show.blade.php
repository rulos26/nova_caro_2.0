@extends('adminlte::page')

@section('template_title')
    {{ $verificacionesChecklist->name ?? __('Show') . " " . __('Verificaciones Checklist') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Verificaciones Checklist</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('verificaciones-checklists.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $verificacionesChecklist->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion 1:</strong>
                                    {{ $verificacionesChecklist->verificacion_1 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion 2:</strong>
                                    {{ $verificacionesChecklist->verificacion_2 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion 3:</strong>
                                    {{ $verificacionesChecklist->verificacion_3 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verificacion Final:</strong>
                                    {{ $verificacionesChecklist->verificacion_final }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
