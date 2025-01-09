@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Confirmación</h3>
                    </div>

                    <div class="card-body bg-white">
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center">
                                <p>¿Desea agregar otra experiencia laboral?</p>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-primary btn-sm mx-2" href="{{ route('informaciones-academicas.create') }}">{{ __('Sí') }}</a>
                                    <a class="btn btn-success btn-sm mx-2" href="{{ route('informaciones-academicas.index') }}">{{ __('No') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('sidebar.right-sidebar')