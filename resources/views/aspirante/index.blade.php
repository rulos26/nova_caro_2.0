@extends('adminlte::page')

@section('template_title')
Aspirantes
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Aspirantes') }}
                        </span>
                        <div class="float-right">
                            @if ($creado == 0)
                            <a href="{{ route('aspirantes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                            @else
                            <a href="{{ route('reporte.evaluado') }}" class="btn btn-primary btn-sm float-left" data-placement="left">
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
                                    <th>Nombres</th>
                                    <th>Cedula</th>
                                    <th>Lugar Expedicion</th>
                                    <th>fecha de Nacimiento</th>
                                    <th>Lugar Nacimiento</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aspirantes as $aspirante)
                                <tr>
                                    <td>{{ $aspirante->nombres }}</td>
                                    <td>{{ $aspirante->cedula }}</td>
                                    <td>{{ $aspirante->lugar_expedicion->nombre }}</td>
                                    <td>{{ $aspirante->dia_nacimiento }}-{{ $aspirante->mes_nacimiento }}-{{ $aspirante->año_nacimiento }}</td>
                                    <td>{{ $aspirante->municipio->nombre }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ route('aspirantes.edit', $aspirante->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Botones de navegación -->
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('busquedas.create') }}" class="btn btn-secondary">Atrás</a>
                        <a href=" {{ route('informacion-laborales.index') }}" class="btn btn-primary">Siguiente</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('sidebar.right-sidebar')


