@extends('adminlte::page')

@section('template_title')
    {{ $seguridade->name ?? __('Show') . " " . __('Seguridade') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Seguridade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('seguridades.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cedula:</strong>
                                    {{ $seguridade->cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Link:</strong>
                                    {{ $seguridade->id_link }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('sidebar.right-sidebar')