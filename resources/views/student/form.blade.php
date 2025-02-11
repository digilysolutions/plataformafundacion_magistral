<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="activated" class="form-label">{{ __('Activcado') }}</label>
            <input type="text" name="activated" class="form-control @error('activated') is-invalid @enderror" value="{{ old('activated', $student?->activated) }}" id="activated" placeholder="Activated">
            {!! $errors->first('activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="people_id" class="form-label">{{ __('Persona') }}</label>
            <input type="text" name="people_id" class="form-control @error('people_id') is-invalid @enderror" value="{{ old('people_id', $student?->people_id) }}" id="people_id" placeholder="People Id">
            {!! $errors->first('people_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="course" class="form-label">{{ __('Course') }}</label>
            <input type="text" name="course" class="form-control @error('course') is-invalid @enderror" value="{{ old('course', $student?->course) }}" id="course" placeholder="Course">
            {!! $errors->first('course', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="studycenters_id" class="form-label">{{ __('Studycenters Id') }}</label>
            <input type="text" name="studycenters_id" class="form-control @error('studycenters_id') is-invalid @enderror" value="{{ old('studycenters_id', $student?->studycenters_id) }}" id="studycenters_id" placeholder="Studycenters Id">
            {!! $errors->first('studycenters_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $student?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="membership_id" class="form-label">{{ __('Membership Id') }}</label>
            <input type="text" name="membership_id" class="form-control @error('membership_id') is-invalid @enderror" value="{{ old('membership_id', $student?->membership_id) }}" id="membership_id" placeholder="Membership Id">
            {!! $errors->first('membership_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
