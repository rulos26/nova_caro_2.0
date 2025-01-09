<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="cedula" class="form-label">{{ __('Cedula') }}</label>
            <input type="text" name="cedula" class="form-control @error('cedula') is-invalid @enderror" value="{{ old('cedula', $transito?->cedula) }}" id="cedula" placeholder="Cedula">
            {!! $errors->first('cedula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_link" class="form-label">{{ __('Id Link') }}</label>
            <input type="text" name="id_link" class="form-control @error('id_link') is-invalid @enderror" value="{{ old('id_link', $transito?->id_link) }}" id="id_link" placeholder="Id Link">
            {!! $errors->first('id_link', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="verificado" class="form-label">{{ __('Verificado') }}</label>
            <input type="text" name="verificado" class="form-control @error('verificado') is-invalid @enderror" value="{{ old('verificado', $transito?->verificado) }}" id="verificado" placeholder="Verificado">
            {!! $errors->first('verificado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_verificacion" class="form-label">{{ __('Id Verificacion') }}</label>
            <input type="text" name="id_verificacion" class="form-control @error('id_verificacion') is-invalid @enderror" value="{{ old('id_verificacion', $transito?->id_verificacion) }}" id="id_verificacion" placeholder="Id Verificacion">
            {!! $errors->first('id_verificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>