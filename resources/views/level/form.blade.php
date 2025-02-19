<div class="row padding-1 p-1">
    <div class="col-md-12">


        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $level?->name) }}" id="name" placeholder="Nombre">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $level?->description) }}" id="description" placeholder="Descripción">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="specialty_id" class="form-label">{{ __('Especialidad Id') }}</label>
            <input type="text" name="specialty_id" class="form-control @error('specialty_id') is-invalid @enderror" value="{{ old('specialty_id', $level?->specialty_id) }}" id="specialty_id" placeholder="Especialidad">
            {!! $errors->first('specialty_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
            <input type="checkbox" class="custom-control-input bg-primary" id="customCheck-1" name="activated"
                checked="">
            <label class="custom-control-label" for="customCheck-1"> Activado</label>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
