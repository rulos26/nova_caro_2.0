@extends('adminlte::page')

@section('template_title')
    {{ __('Create') }} Verificaciones Academica
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Verificaciones Academica</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('verificaciones-academicas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('verificaciones-academica.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('sidebar.right-sidebar')
