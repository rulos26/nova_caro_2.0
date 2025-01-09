<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            {{-- <label for="cedula" class="form-label">{{ __('Cedula') }}</label>
             --}}<input type="hidden" name="cedula" class="form-control @error('cedula') is-invalid @enderror" value="{{ old('cedula', $verificacionesNegocio?->cedula) }}" id="cedula" placeholder="Cedula">
            {!! $errors->first('cedula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="verificacion" class="form-label">{{ __('Verificacion') }}</label>
            <textarea name="verificacion" class="form-control @error('verificacion') is-invalid @enderror" id="verificacion" placeholder="Verificacion">{{ old('verificacion', $verificacionesNegocio?->verificacion) }}</textarea>
            {!! $errors->first('verificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            {{-- <label for="id_negocios" class="form-label">{{ __('Id Negocios') }}</label>
            --}} <input type="hidden" name="id_negocios" class="form-control @error('id_negocios') is-invalid @enderror" value="{{ old('id_negocios', $verificacionesNegocio?->id_negocios) }}" id="id_negocios" placeholder="Id Negocios">
            {!! $errors->first('id_negocios', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
           {{--  <label for="verificado" class="form-label">{{ __('Verificado') }}</label>
           --}}  <input type="hidden" name="verificado" class="form-control @error('verificado') is-invalid @enderror" value="1" id="verificado" placeholder="Verificado">
            {!! $errors->first('verificado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>