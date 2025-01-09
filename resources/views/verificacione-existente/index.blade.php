@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')


<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Estado de lo Modulos</span>
                </div>
                <div class="card-body bg-white">

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Nombre Modulo </th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Datos Aspirante</td>
                                    @if($aspirante_master == 0)
                                    <td
                                        style="border: 1px solid black; background-color: red; color: white; font-weight: bold;">
                                        Sin Realizar</td>
                                    @else
                                    <td style="background-color: green; color: white; font-weight: bold;">Realizado</td>
                                    @endif
                                    
                                    @if($aspirante_master == 0)
                                    <td><a href="{{ route('aspirantes.index') }}"
                                            class="btn btn-primary btn-sm">Agregar</a></td>
                                    @else
                                    <td><a href="{{ route('aspirantes.index') }}"
                                            class="btn btn-success btn-sm">Editar</a></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Informacion Academica </td>
                                    @if($academica_master == 0)
                                    <td
                                        style="border: 1px solid black; background-color: red; color: white; font-weight: bold;">
                                        Sin Realizar</td>
                                    @else
                                    <td style="background-color: green; color: white; font-weight: bold;">Realizado</td>
                                    @endif
                                
                                    @if($academica_master == 0)
                                    <td><a href="{{ route('informacion-laborales.index') }}"
                                            class="btn btn-primary btn-sm">Agregar</a></td>
                                    @else
                                    <td><a href="{{ route('informacion-laborales.index') }}"
                                            class="btn btn-success btn-sm">Editar</a></td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>Informacion Academica </td>
                                    @if($academica_master == 0)
                                    <td
                                        style="border: 1px solid black; background-color: red; color: white; font-weight: bold;">
                                        Sin Realizar</td>
                                    @else
                                    <td style="background-color: green; color: white; font-weight: bold;">Realizado</td>
                                    @endif
                                
                                    @if($academica_master == 0)
                                    <td><a href="{{ route('informaciones-academicas.index') }}"
                                            class="btn btn-primary btn-sm">Agregar</a></td>
                                    @else
                                    <td><a href="{{ route('informaciones-academicas.index') }}"
                                            class="btn btn-success btn-sm">Editar</a></td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>Verificaciones </td>
                                    @if($academica_master == 0)
                                    <td
                                        style="border: 1px solid black; background-color: red; color: white; font-weight: bold;">
                                        Sin Realizar</td>
                                    @else
                                    <td style="background-color: green; color: white; font-weight: bold;">Realizado</td>
                                    @endif
                                
                                    @if($academica_master == 0)
                                    <td><a href="{{ route('verificacion-existentes.create') }}"
                                            class="btn btn-primary btn-sm">Agregar</a></td>
                                    @else
                                    <td><a href="{{ route('verificacion-existentes.create') }}"
                                            class="btn btn-success btn-sm">Editar</a></td>
                                    @endif

                                </tr>
                               
                                
                             
                                
                                
                               
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@include('sidebar.right-sidebar')