@extends('adminlte::page')

@section('title', 'Enviar Lista')

@section('content_header')
    <h1>Enviar Lista de Observaciones</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="informForm" action="{{ route('checklist.inform') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" id="observaciones" name="observaciones" rows="4" required></textarea>
                </div>
                <input type="hidden" name="cedula" value="{{ $cedula }}">
                <button type="button" class="btn btn-success" onclick="confirmInform()">Informar al Administrador</button>
            </form>
        </div>
    </div>

    <script>
        function confirmInform() {
            if (confirm('¿Está seguro de informar al administrador?')) {
                document.getElementById('informForm').submit();
            } else {
                window.location.href = "{{ route('checklist.index') }}";
            }
        }
    </script>
@endsection
