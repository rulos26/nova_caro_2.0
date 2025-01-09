@extends('adminlte::page')
@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')

<section class="content container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header bg-primary text-white">
                    <span class="card-title">Módulo de Verificación</span>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre del Módulo</th>
                                    <th class="text-center">Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="fw-bold">Seguridad</td>
                                    <tr>
                                        <td>Libreta Militar</td>
                                        <td class="text-center realizado">Realizado</td>
                                        <td><a href="#" class="btn btn-link">Link</a></td>
                                    </tr>
                                    <tr>
                                        <td>Policía Registró Medidas Correctivas</td>
                                        <td class="text-center sin-realizar">Sin Realizar</td>
                                        <td><a href="#" class="btn btn-link">Link</a></td>
                                    </tr>
                                    <tr>
                                        <td>RNMC - NUEVA</td>
                                        <td class="text-center realizado">Realizado</td>
                                        <td><a href="#" class="btn btn-link">Link</a></td>
                                    </tr>
                                    <tr>
                                        <td>Interpol</td>
                                        <td class="text-center sin-realizar">Sin Realizar</td>
                                        <td><a href="#" class="btn btn-link">Link</a></td>
                                    </tr>
                                    <tr>
                                        <td>Consulta documentos extraviados en la policía</td>
                                        <td class="text-center realizado">Realizado</td>
                                        <td><a href="#" class="btn btn-link">Link</a></td>
                                    </tr>
                                    <tr>
                                        <td>OFAC</td>
                                        <td class="text-center sin-realizar">Sin Realizar</td>
                                        <td><a href="#" class="btn btn-link">Link</a></td>
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
@section('css')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<style>
    .realizado {
        background-color: #28a745;
        color: white;
    }

    .sin-realizar {
        background-color: #dc3545;
        color: white;
    }

    .table th {
        background-color: #f2a88a;
    }
</style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
@stop