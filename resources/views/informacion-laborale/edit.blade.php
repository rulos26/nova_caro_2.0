@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Informacion Laborale
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Informacion Laborale</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('informacion-laborales.update', $informacionLaborale->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('informacion-laborale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('sidebar.right-sidebar')