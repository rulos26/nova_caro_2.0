@extends('adminlte::page')

@section('template_title')
Antecedentes
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Antecedentes') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('antecedentes.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Modulo</th>
                                    <th>Pagina</th>
                                    <th>Verificado</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($antecedentes as $antecedente)
                                <tr>
                                    <td>{{ $antecedente->link->nombre }}</td>
                                    <td><a class="btn btn-sm btn-primary " href="{{$antecedente->link->link}}"
                                            target="_blank"><i class="fa fa-fw fa-eye"></i> {{ __('ir pagina') }}</a>
                                    </td>
                                    @foreach($antecedente->VerificacionesAntecedente as $VerificacionesAntecedente)
                                            
                                            @if($VerificacionesAntecedente->verificado == 1)
                                            <td><a class="btn btn-sm btn-success"
                                                href="{{ route('verificaciones-antecedentes.edit', $VerificacionesAntecedente->id) }}">
                                                <i class="fas fa-check-circle"></i> {{ __('Verificado') }}
                                            </a></td>
                                            @else
                                            <td> <a class="btn btn-sm btn-danger"
                                                href="{{ route('verificaciones-antecedentes.edit', $VerificacionesAntecedente->id) }}">
                                                <i class="fas fa-times-circle"></i> {{ __('Sin Verificación') }}
                                            </a></td>
                                            @endif
                                        @endforeach

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('seguridad-sociales.index') }}" class="btn btn-secondary">Atrás</a>
                <a href=" {{ route('colpensiones.index') }}" class="btn btn-primary">Siguiente</a>
            </div>
        </div>
    </div>
</div>
@endsection
@include('sidebar.right-sidebar')