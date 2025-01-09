<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="cedula" class="form-label">{{ __('Cedula') }}</label>
            <input type="text" name="cedula" class="form-control @error('cedula') is-invalid @enderror" value="{{ old('cedula', $verificacionesChecklist?->cedula) }}" id="cedula" placeholder="Cedula">
            {!! $errors->first('cedula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="verificacion_1" class="form-label">{{ __('Verificacion 1') }}</label>
            <input type="text" name="verificacion_1" class="form-control @error('verificacion_1') is-invalid @enderror" value="{{ old('verificacion_1', $verificacionesChecklist?->verificacion_1) }}" id="verificacion_1" placeholder="Verificacion 1">
            {!! $errors->first('verificacion_1', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="verificacion_2" class="form-label">{{ __('Verificacion 2') }}</label>
            <input type="text" name="verificacion_2" class="form-control @error('verificacion_2') is-invalid @enderror" value="{{ old('verificacion_2', $verificacionesChecklist?->verificacion_2) }}" id="verificacion_2" placeholder="Verificacion 2">
            {!! $errors->first('verificacion_2', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="verificacion_3" class="form-label">{{ __('Verificacion 3') }}</label>
            <input type="text" name="verificacion_3" class="form-control @error('verificacion_3') is-invalid @enderror" value="{{ old('verificacion_3', $verificacionesChecklist?->verificacion_3) }}" id="verificacion_3" placeholder="Verificacion 3">
            {!! $errors->first('verificacion_3', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="verificacion_final" class="form-label">{{ __('Verificacion Final') }}</label>
            <input type="text" name="verificacion_final" class="form-control @error('verificacion_final') is-invalid @enderror" value="{{ old('verificacion_final', $verificacionesChecklist?->verificacion_final) }}" id="verificacion_final" placeholder="Verificacion Final">
            {!! $errors->first('verificacion_final', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>