@extends('adminlte::page')

@section('template_title')
    {{ $notificacionesChecklist->name ?? __('Show') . " " . __('Notificaciones Checklist') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Notificaciones Checklist</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('notificaciones-checklists.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $notificacionesChecklist->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nueva:</strong>
                                    {{ $notificacionesChecklist->nueva }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
