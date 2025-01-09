@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Antecedente
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Antecedente</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('antecedentes.update', $antecedente->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('antecedente.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('sidebar.right-sidebar')