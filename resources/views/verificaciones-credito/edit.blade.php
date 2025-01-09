@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Verificaciones Credito
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Verificaciones Credito</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('verificaciones-creditos.update', $verificacionesCredito->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('verificaciones-credito.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
