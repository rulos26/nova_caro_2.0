<div class="row padding-1 p-1">
    <input type="hidden" name="cedula" value="{{ $cedula }}">
    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="nombres" class="form-label">{{ __('Nombres') }}</label>
            <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror"
                value="{{ old('nombres', $aspirante?->nombres) }}" id="nombres" placeholder="Nombres">
            {!! $errors->first('nombres', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>')
            !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="lugar_expedicion" class="form-label">{{ __('Lugar de Expedición') }}</label>
            <select name="id_lugar_expedicion" class="form-control @error('lugar_expedicion') is-invalid @enderror" id="lugar_expedicion">
                @foreach($lugar_expedicion as $expedicion)
                    <option value="{{ $expedicion->id }}" {{ old('lugar_expedicion', $aspirante?->id_lugar_expedicion) == $expedicion->id ? 'selected' : '' }}>{{ $expedicion->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('lugar_expedicion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="dia_nacimiento" class="form-label">{{ __('Día de Nacimiento') }}</label>
            <input type="number" name="dia_nacimiento" class="form-control @error('dia_nacimiento') is-invalid @enderror"
                value="{{ old('dia_nacimiento', $aspirante?->dia_nacimiento) }}" id="dia_nacimiento"
                placeholder="Día de Nacimiento" min="1" max="31">
            {!! $errors->first('dia_nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="mes_nacimiento" class="form-label">{{ __('Mes de Nacimiento') }}</label>
            <input type="number" name="mes_nacimiento" class="form-control @error('mes_nacimiento') is-invalid @enderror"
                value="{{ old('mes_nacimiento', $aspirante?->mes_nacimiento) }}" id="mes_nacimiento"
                placeholder="Mes de Nacimiento" min="1" max="12">
            {!! $errors->first('mes_nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="año_nacimiento" class="form-label">{{ __('Año de Nacimiento') }}</label>
            <input type="number" name="año_nacimiento" class="form-control @error('año_nacimiento') is-invalid @enderror"
                value="{{ old('año_nacimiento', $aspirante?->año_nacimiento) }}" id="año_nacimiento"
                placeholder="Año de Nacimiento" min="1900" max="{{ date('Y') }}">
            {!! $errors->first('año_nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="lugar_nacimiento" class="form-label">{{ __('Lugar de Nacimiento') }}</label>
            <select name="id_lugar_nacimiento" class="form-control @error('lugar_nacimiento') is-invalid @enderror" id="lugar_nacimiento">
                @foreach($lugar_nacimiento as $nacimiento)
                    <option value="{{ $nacimiento->id }}" {{ old('lugar_nacimiento', $aspirante?->id_lugar_nacimiento) == $nacimiento->id ? 'selected' : '' }}>{{ $nacimiento->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('lugar_nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="edad" class="form-label">{{ __('Edad') }}</label>
            <input type="number" name="edad" class="form-control @error('edad') is-invalid @enderror"
                value="{{ old('edad', $aspirante?->edad) }}" id="edad" placeholder="Edad" min="0">
            {!! $errors->first('edad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Dirección') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror"
                value="{{ old('direccion', $aspirante?->direccion) }}" id="direccion" placeholder="Dirección">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="barrio" class="form-label">{{ __('Barrio') }}</label>
            <input type="text" name="barrio" class="form-control @error('barrio') is-invalid @enderror"
                value="{{ old('barrio', $aspirante?->barrio) }}" id="barrio" placeholder="Barrio">
            {!! $errors->first('barrio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="ciudad" class="form-label">{{ __('Ciudad') }}</label>
            <select name="id_ciudad" class="form-control @error('ciudad') is-invalid @enderror" id="ciudad">
                @foreach($ciudad as $city)
                    <option value="{{ $city->id }}" {{ old('ciudad', $aspirante?->id_ciudad) == $city->id ? 'selected' : '' }}>{{ $city->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('ciudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="telefono_fijo" class="form-label">{{ __('Teléfono Fijo') }}</label>
            <input type="number" name="telefono_fijo" class="form-control @error('telefono_fijo') is-invalid @enderror"
                value="{{ old('telefono_fijo', $aspirante?->telefono_fijo) }}" id="telefono_fijo" placeholder="Teléfono Fijo">
            {!! $errors->first('telefono_fijo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="movil" class="form-label">{{ __('Móvil') }}</label>
            <input type="number" name="movil" class="form-control @error('movil') is-invalid @enderror"
                value="{{ old('movil', $aspirante?->movil) }}" id="movil" placeholder="Móvil">
            {!! $errors->first('movil', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="cargo" class="form-label">{{ __('Cargo') }}</label>
            <input type="text" name="cargo" class="form-control @error('cargo') is-invalid @enderror"
                value="{{ old('cargo', $aspirante?->cargo) }}" id="cargo" placeholder="Cargo">
            {!! $errors->first('cargo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="desde" class="form-label">{{ __('Desde') }}</label>
            <input type="date" name="desde" class="form-control @error('desde') is-invalid @enderror"
                value="{{ old('desde', $aspirante?->desde) }}" id="desde">
            {!! $errors->first('desde', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-2 mb20">
            <label for="hasta" class="form-label">{{ __('Hasta') }}</label>
            <input type="date" name="hasta" class="form-control @error('hasta') is-invalid @enderror"
                value="{{ old('hasta', $aspirante?->hasta) }}" id="hasta">
            {!! $errors->first('hasta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
