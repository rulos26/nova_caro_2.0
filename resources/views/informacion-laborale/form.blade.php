<div class="row">
    <input type="hidden" value="{{$cedula}}" name="cedula">
    <div class="col-md-3">
        <div class="form-group mb-2 mb-20">
            <label for="compania" class="form-label">{{ __('Compañía') }}</label>
            <input type="text" name="compania" class="form-control @error('compania') is-invalid @enderror" value="{{ old('compania', $informacionLaborale?->compania) }}" id="compania" placeholder="Compañía">
            {!! $errors->first('compania', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2 mb-20">
            <label for="cargo" class="form-label">{{ __('Cargo') }}</label>
            <input type="text" name="cargo" class="form-control @error('cargo') is-invalid @enderror" value="{{ old('cargo', $informacionLaborale?->cargo) }}" id="cargo" placeholder="Cargo">
            {!! $errors->first('cargo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2 mb-20">
            <label for="ingreso" class="form-label">{{ __('Ingreso') }}</label>
            <input type="date" name="ingreso" class="form-control @error('ingreso') is-invalid @enderror" value="{{ old('ingreso', $informacionLaborale?->ingreso) }}" id="ingreso" placeholder="Ingreso">
            {!! $errors->first('ingreso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2 mb-20">
            <label for="retiro" class="form-label">{{ __('Retiro') }}</label>
            <input type="date" name="retiro" class="form-control @error('retiro') is-invalid @enderror" value="{{ old('retiro', $informacionLaborale?->retiro) }}" id="retiro" placeholder="Retiro">
            {!! $errors->first('retiro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-2 mb-20">
            <label for="telefono" class="form-label">{{ __('Teléfono') }}</label>
            <input type="number" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $informacionLaborale?->telefono) }}" id="telefono" placeholder="Teléfono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-2">
        <input type="hidden" name="cedula" value="{{ $informacionLaborale?->cedula }}">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
