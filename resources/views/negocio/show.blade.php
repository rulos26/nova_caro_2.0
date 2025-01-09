@extends('adminlte::page')

@section('template_title')
    {{ $negocio->name ?? __('Show') . " " . __('Negocio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Negocio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('negocios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $negocio->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Link:</strong>
                                    {{ $negocio->id_link }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
