@extends('adminlte::page')

@section('template_title')
Información Laborales
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Información Laborales') }}
                        </span>

                        <div class="float-right">

                            @if ($creado == 0)
                            <a href="{{ route('informacion-laborales.create') }}"
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
                                    <th>Compania</th>
                                    <th>Cargo</th>
                                    <th>Ingreso</th>
                                    <th>Retiro</th>
                                    <th>Telefono</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($informacionLaborales as $informacionLaborale)
                                <tr>
                                    <td>{{ $informacionLaborale->compania }}</td>
                                    <td>{{ $informacionLaborale->cargo }}</td>
                                    <td>{{ $informacionLaborale->ingreso }}</td>
                                    <td>{{ $informacionLaborale->retiro }}</td>
                                    <td>{{ $informacionLaborale->telefono }}</td>

                                    <td>
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('informacion-laborales.edit', $informacionLaborale->id) }}"><i
                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>

                                    </td>

                                    @foreach ($informacionLaborale->verificacionesLaborales as $verificaciones)

                                    @if($verificaciones->verificado == 1)
                                    <td>

                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('verificaciones-laborales.edit', $informacionLaborale->id) }}">
                                            <i class="fas fa-check-circle"></i> {{ __('Verificado') }}
                                        </a>
                                    </td>
                                    @else

                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('verificaciones-laborales.edit', $informacionLaborale->id) }}">
                                            <i class="fas fa-times-circle"></i> {{ __('Sin Verificación') }}
                                        </a>
                                    </td>
                                    @endif
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('aspirantes.index') }}" class="btn btn-secondary">Atrás</a>
                        <a href=" {{ route('informaciones-academicas.index') }}" class="btn btn-primary">Siguiente</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@include('sidebar.right-sidebar')