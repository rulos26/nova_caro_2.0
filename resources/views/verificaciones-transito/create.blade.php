@extends('adminlte::page')

@section('template_title')
    {{ __('Create') }} Verificaciones Transito
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Verificaciones Transito</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('verificaciones-transitos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('verificaciones-transito.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('sidebar.right-sidebar')