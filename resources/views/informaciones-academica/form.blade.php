<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-3">
                <label for="institucion" class="form-label">{{ __('Institucion') }}</label>
                <input type="text" name="institucion" class="form-control @error('institucion') is-invalid @enderror" value="{{ old('institucion', $informacionesAcademica?->institucion) }}" id="institucion" placeholder="Institucion">
                {!! $errors->first('institucion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="titulo_programa" class="form-label">{{ __('Titulo Programa') }}</label>
                <input type="text" name="titulo_programa" class="form-control @error('titulo_programa') is-invalid @enderror" value="{{ old('titulo_programa', $informacionesAcademica?->titulo_programa) }}" id="titulo_programa" placeholder="Titulo Programa">
                {!! $errors->first('titulo_programa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="fecha_de_grado" class="form-label">{{ __('Fecha De Grado') }}</label>
                <input type="date" name="fecha_de_grado" class="form-control @error('fecha_de_grado') is-invalid @enderror" value="{{ old('fecha_de_grado', $informacionesAcademica?->fecha_de_grado) }}" id="fecha_de_grado" placeholder="Fecha De Grado">
                {!! $errors->first('fecha_de_grado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
                <input type="number" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $informacionesAcademica?->telefono) }}" id="telefono" placeholder="Telefono">
                {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="id_ciudad_academica" class="form-label">{{ __('Ciudad') }}</label>
                <select name="id_ciudad_academica" class="form-control @error('id_ciudad_academica') is-invalid @enderror" id="id_ciudad_academica">
                    <option value="" disabled selected>Seleccione una ciudad</option>
                    @foreach($ciudad as $ciudad)
                        <option value="{{ $ciudad->id }}" {{ old('id_ciudad_academica', $informacionesAcademica?->id_ciudad_academica) == $ciudad->id ? 'selected' : '' }}>
                            {{ $ciudad->nombre }}
                        </option>
                    @endforeach
                </select>
                {!! $errors->first('id_ciudad_academica', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </div>
</div>
