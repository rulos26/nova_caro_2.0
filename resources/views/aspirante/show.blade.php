@extends('adminlte::page')

@section('template_title')
{{ $aspirante->name ?? __('Mostrar') . " " . __('Aspirante') }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user"></i> {{ __('Detalle del Aspirante') }}
                    </h5>
                    <a class="btn btn-secondary btn-sm" href="{{ route('aspirantes.index') }}">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver') }}
                    </a>
                </div>

                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-md-3"> {{-- fila uno --}}
                            <div class="form-group">
                                <label><i class="fas fa-id-card"></i> <strong>Nombres:</strong></label>
                                <p class="text-muted">{{ $aspirante->nombres }}</p>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-birthday-cake"></i> <strong>Fecha de
                                        Nacimiento:</strong></label>
                                <p class="text-muted">{{ $aspirante->dia_nacimiento }}/{{ $aspirante->mes_nacimiento
                                    }}/{{ $aspirante->año_nacimiento }}</p>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-building"></i> <strong>Barrio:</strong></label>
                                <p class="text-muted">{{ $aspirante->barrio }}</p>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-calendar-alt"></i> <strong>Período de Inicio:</strong></label>
                                <p class="text-muted">{{ $aspirante->desde }} </p>
                            </div>
                        </div>{{-- fin fila uno --}}
                        <div class="col-md-3">{{-- fila dos --}}
                            <div class="form-group">
                                <label><i class="fas fa-address-card"></i> <strong>Cédula:</strong></label>
                                <p class="text-muted">{{ $aspirante->cedula }}</p>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-user-clock"></i> <strong>Edad:</strong></label>
                                <p class="text-muted">{{ $aspirante->edad }}</p>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-phone"></i> <strong>Teléfono Fijo:</strong></label>
                                <p class="text-muted">{{ $aspirante->telefono_fijo }}</p>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-calendar-alt"></i> <strong>Período de Fin:</strong></label>
                                <p class="text-muted">{{ $aspirante->hasta }}</p>
                            </div>
                        </div>{{-- fin fila dos --}}
                        <div class="col-md-3">{{-- fila tres --}}
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt"></i> <strong>Lugar de
                                        Expedición:</strong></label>
                                <p class="text-muted">{{ $aspirante->id_lugar_expedicion }}</p>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-city"></i> <strong>Ciudad:</strong></label>
                                <p class="text-muted">{{ $aspirante->id_ciudad }}</p>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-mobile-alt"></i> <strong>Móvil:</strong></label>
                                <p class="text-muted">{{ $aspirante->móvil }}</p>
                            </div>

                        </div>{{-- fin fila tres --}}
                        <div class="col-md-3">{{-- fila cuatro --}}
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt"></i> <strong>Lugar de
                                        Nacimiento:</strong></label>
                                <p class="text-muted">{{ $aspirante->id_lugar_nacimiento }}</p>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-home"></i> <strong>Dirección:</strong></label>
                                <p class="text-muted">{{ $aspirante->direccion }}</p>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-briefcase"></i> <strong>Cargo:</strong></label>
                                <p class="text-muted">{{ $aspirante->cargo }}</p>
                            </div>
                        </div>{{-- fin fila cuatro --}}












                    </div>
                </div>
                <div class="card-footer text-center bg-primary">
                    <a class="btn btn-secondary btn-sm" href="{{ route('aspirantes.index') }}">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection