@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Cartas Imagene
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Cartas Imagene</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('cartas-imagenes.update', $cartasImagene->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cartas-imagene.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
