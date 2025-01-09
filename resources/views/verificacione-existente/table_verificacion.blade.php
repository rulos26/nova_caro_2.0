@extends('adminlte::page')

@section('title', 'Módulo de Verificación')

@section('content_header')
<h1 class="m-0 text-dark">Módulo de Verificación</h1>
@stop

@section('content')

<section class="content container-fluid">


    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card card-outline card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Tránsito</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <center><a href="{{ route('transito') }}" class="btn btn-primary btn-sm">Ir</a></center>
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card card-outline card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Registraduría</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <center><a href="{{ route('registraduria') }}" class="btn btn-primary btn-sm">Ir</a></center>
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card card-outline card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Seguridad Social</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <center><a href="{{ route('seguridad_social') }}" class="btn btn-primary btn-sm">Ir</a></center>
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card card-outline card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Antecedentes</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <center><a href="{{ route('antecedentes') }}" class="btn btn-primary btn-sm">Ir</a></center>
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card card-outline card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Colpensiones</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <center><a href="{{ route('colpensiones') }}" class="btn btn-primary btn-sm">Ir</a></center>
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card card-outline card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Seguridad</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <center><a href="{{ route('seguridad') }}" class="btn btn-primary btn-sm">Ir</a></center>
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card card-outline card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">UGPP</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <center><a href="{{ route('ugpp') }}" class="btn btn-primary btn-sm">Ir</a></center>
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card card-outline card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Negocios</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <center><a href="{{ route('negocios') }}" class="btn btn-primary btn-sm">Ir</a></center>
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card card-outline card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Crédito</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <center><a href="{{ route('credito') }}" class="btn btn-primary btn-sm">Ir</a></center>
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card card-outline card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Otros</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <center><a href="{{ route('otros') }}" class="btn btn-primary btn-sm">Ir</a></center>
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