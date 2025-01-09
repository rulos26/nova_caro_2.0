@extends('adminlte::page')

@section('title', 'Checklist')

@section('content_header')
<h1>Evaluador de Módulos</h1>
@endsection

@section('content')
@if ($revision == 1)
        <div class="alert alert-success m-4">
            <p> El documento esta revision por parte del administrador</p>
        </div>
        @endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Módulos</h3>
        
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Módulo</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table => $completed)
                <tr>
                    <td>{{ ucfirst(str_replace('_', ' ', $table)) }}</td>
                    <td>{{ $completed ? 'Realizado' : 'Por Realizar' }}</td>
                    <td>
                        @if (!$completed)
                        @php
                        $routeName = str_replace('_', '-', $table) . '.index';
                        @endphp
                        <a href="{{ route($routeName) }}" class="btn btn-warning">Editar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($allCompleted)

        @if($revision == 1)
        documento esta esta revision
        @else
        <form action="{{ route('checklist.submit') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Enviar Checklist</button>
        </form>
        @endif
        @endif
    </div>
</div>
@endsection