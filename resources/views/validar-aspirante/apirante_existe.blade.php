@extends('adminlte::page')
@section('template_title')
{{ __('Create') }} Busqueda
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Busqueda Aspirante</span>
                </div>
                <div class="card-body bg-white">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            Hemos encontrado un registro en nuestra base de datos, ¿desea ver los módulos?
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-1"><a href="{{ route('verificacion-existentes.index') }}"
                                class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Si') }}
                            </a></div>
                        <div class="col-2">
                            <a href="{{ route('busquedas.create') }}" class="btn btn-secondary btn-sm float-right"
                                data-placement="left">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@include('sidebar.right-sidebar')