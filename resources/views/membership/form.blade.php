<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="activated" class="form-label">{{ __('Activcado') }}</label>
            <input type="text" name="activated" class="form-control @error('activated') is-invalid @enderror" value="{{ old('activated', $membership?->activated) }}" id="activated" placeholder="Activated">
            {!! $errors->first('activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $membership?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price" class="form-label">{{ __('Price') }}</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $membership?->price) }}" id="price" placeholder="Price">
            {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="duration_days" class="form-label">{{ __('Duration Days') }}</label>
            <input type="text" name="duration_days" class="form-control @error('duration_days') is-invalid @enderror" value="{{ old('duration_days', $membership?->duration_days) }}" id="duration_days" placeholder="Duration Days">
            {!! $errors->first('duration_days', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_studio_center" class="form-label">{{ __('Is Studio Center') }}</label>
            <input type="text" name="is_studio_center" class="form-control @error('is_studio_center') is-invalid @enderror" value="{{ old('is_studio_center', $membership?->is_studio_center) }}" id="is_studio_center" placeholder="Is Studio Center">
            {!! $errors->first('is_studio_center', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="student_limit" class="form-label">{{ __('Student Limit') }}</label>
            <input type="text" name="student_limit" class="form-control @error('student_limit') is-invalid @enderror" value="{{ old('student_limit', $membership?->student_limit) }}" id="student_limit" placeholder="Student Limit">
            {!! $errors->first('student_limit', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="limite_items" class="form-label">{{ __('Limite Items') }}</label>
            <input type="text" name="limite_items" class="form-control @error('limite_items') is-invalid @enderror" value="{{ old('limite_items', $membership?->limite_items) }}" id="limite_items" placeholder="Limite Items">
            {!! $errors->first('limite_items', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
