@extends('adminlte::page')

@section('template_title')
Informaciones Academicas
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Informaciones Academicas') }}
                        </span>

                        <div class="float-right">

                            @if ($creado == 0)
                            <a href="{{ route('informaciones-academicas.create') }}"
                                class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                            @else
                            <a href="{{ route('reporte.evaluado') }}" class="btn btn-primary btn-sm float-left"
                                data-placement="left">
                                {{ __('reporte') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Institucion</th>
                                    <th>Titulo Programa</th>
                                    <th>Fecha De Grado</th>
                                    <th>Telefono</th>
                                    <th>Ciudad</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($informacionesAcademicas as $informacionesAcademica)
                                <tr>
                                    <td>{{ $informacionesAcademica->institucion }}</td>
                                    <td>{{ $informacionesAcademica->titulo_programa }}</td>
                                    <td>{{ $informacionesAcademica->fecha_de_grado }}</td>
                                    <td>{{ $informacionesAcademica->telefono }}</td>
                                    <td>{{ $informacionesAcademica->municipio->nombre }}</td>

                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('informaciones-academicas.edit', $informacionesAcademica->id) }}"><i
                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                
                                    </td>
                                    @foreach($informacionesAcademica->verificacionesAcademica as $verificacionesAcademica )
                                    {{-- {{$verificacionesAcademica->id}} --}}
                                    @if($verificacionesAcademica->verificado == 1)
                                    <td><a class="btn btn-sm btn-success"
                                            href="{{ route('verificaciones-academicas.edit', $verificacionesAcademica->id) }}">
                                            <i class="fas fa-check-circle"></i> {{ __('Verificado') }}
                                        </a></td>
                                    @else
                                    <td> <a class="btn btn-sm btn-danger"
                                            href="{{ route('verificaciones-academicas.edit', $verificacionesAcademica->id) }}">
                                            <i class="fas fa-times-circle"></i> {{ __('Sin Verificación') }}
                                        </a></td>
                                    @endif
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('informacion-laborales.index') }}" class="btn btn-secondary">Atrás</a>
                <a href=" {{ route('photos.index') }}" class="btn btn-primary">Siguiente</a>
            </div>
        </div>
    </div>
</div>
@endsection