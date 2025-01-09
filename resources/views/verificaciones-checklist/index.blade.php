@extends('adminlte::page')

@section('template_title')
    Verificaciones Checklists
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Verificaciones Checklists') }}
                            </span>

                             <div class="float-right">
                               
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
                                        <th>Cédula</th>
                                        <th>Nombre Aspirante</th>
                                        <th>Evaluador</th>
                                       <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aspirantes as $aspirante)
                                        @php
                                            // Encuentra el informe correspondiente para cada aspirante
                                            $informe = $informe->where('cedula', $aspirante->cedula)->first();
                                        @endphp
                                        <tr>
                                             <td>{{ $aspirante->cedula }}</td>
                                            <td>{{ $aspirante->nombres }}</td>
                                            <td>{{ $informe ? $informe->users->name : 'N/A' }}</td>
                                             <td>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('checklist.admin', $aspirante->cedula) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
