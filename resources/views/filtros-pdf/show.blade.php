@extends('adminlte::page')

@section('template_title')
    {{ $filtrosPdf->name ?? __('Show') . " " . __('Filtros Pdf') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Filtros Pdf</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('filtros-pdfs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Modulo:</strong>
                                    {{ $filtrosPdf->nombre_modulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Visible:</strong>
                                    {{ $filtrosPdf->visible }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
