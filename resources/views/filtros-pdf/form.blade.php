<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre_modulo" class="form-label">{{ __('Nombre Modulo') }}</label>
            <input type="text" name="nombre_modulo" class="form-control @error('nombre_modulo') is-invalid @enderror" value="{{ old('nombre_modulo', $filtrosPdf?->nombre_modulo) }}" id="nombre_modulo" placeholder="Nombre Modulo">
            {!! $errors->first('nombre_modulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="visible" class="form-label">{{ __('Visible') }}</label>
            <input type="text" name="visible" class="form-control @error('visible') is-invalid @enderror" value="{{ old('visible', $filtrosPdf?->visible) }}" id="visible" placeholder="Visible">
            {!! $errors->first('visible', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>