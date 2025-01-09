@extends('adminlte::page')

@section('template_title')
    Observaciones Checklists
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Observaciones Checklists') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('observaciones-checklists.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
									<th >Cedula</th>
									<th >Observaciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($observacionesChecklists as $observacionesChecklist)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $observacionesChecklist->cedula }}</td>
										<td >{{ $observacionesChecklist->observaciones }}</td>

                                            <td>
                                                <form action="{{ route('observaciones-checklists.destroy', $observacionesChecklist->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('observaciones-checklists.show', $observacionesChecklist->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('observaciones-checklists.edit', $observacionesChecklist->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $observacionesChecklists->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
