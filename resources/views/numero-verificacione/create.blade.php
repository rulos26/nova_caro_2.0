@extends('adminlte::page')

@section('template_title')
    {{ __('Create') }} Numero Verificacione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Numero Verificacione</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('numero-verificaciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('numero-verificacione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
