@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Seguridad Sociale
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Seguridad Sociale</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('seguridad-sociales.update', $seguridadSociale->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('seguridad-sociale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('sidebar.right-sidebar')