@extends('adminlte::page')

@section('template_title')
Filtros Pdfs
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Filtros Pdfs') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('filtros-pdfs.show','2') }}" class="btn btn-danger btn-sm float-right"
                            data-placement="left">
                            {{ __('No Mostar Ninguno') }}
                        </a>
                            <a href="{{ route('filtros-pdfs.show','1') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Mostar Todos') }}
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
                                    <th>No</th>

                                    <th>Nombre Modulo</th>
                                    <th>Visible</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($filtrosPdfs as $filtrosPdf)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $filtrosPdf->nombre_modulo }}</td>
                                    
                                    <td>
                                        @if ($filtrosPdf->visible == 1)
                                        <a  href="{{ route('filtros-pdfs.edit', $filtrosPdf->id) }}">
                                            <i class="fas fa-eye text-success" title="No Mostrar en el informe"></i> </a>
                                        @else
                                        <a  href="{{ route('filtros-pdfs.edit', $filtrosPdf->id) }}">
                                            <i class="fas fa-eye-slash text-danger" title="Mostrar en el informe"></i> </a>
                                        @endif
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