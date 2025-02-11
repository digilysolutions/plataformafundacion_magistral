<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="activated" class="form-label">{{ __('Activado') }}</label>
            <input type="text" name="activated" class="form-control @error('activated') is-invalid @enderror" value="{{ old('activated', $tutor?->activated) }}" id="activated" placeholder="Activated">
            {!! $errors->first('activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $tutor?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="people_id" class="form-label">{{ __('Persona') }}</label>
            <input type="text" name="people_id" class="form-control @error('people_id') is-invalid @enderror" value="{{ old('people_id', $tutor?->people_id) }}" id="people_id" placeholder="Persona">
            {!! $errors->first('people_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="specialty_id" class="form-label">{{ __('Specialty Id') }}</label>
            <input type="text" name="specialty_id" class="form-control @error('specialty_id') is-invalid @enderror" value="{{ old('specialty_id', $tutor?->specialty_id) }}" id="specialty_id" placeholder="Specialty Id">
            {!! $errors->first('specialty_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
