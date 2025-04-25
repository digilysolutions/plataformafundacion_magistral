<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="question_id" class="form-label">{{ __('Question Id') }}</label>
            <input type="text" name="question_id" class="form-control @error('question_id') is-invalid @enderror" value="{{ old('question_id', $notificationsQuestion?->question_id) }}" id="question_id" placeholder="Question Id">
            {!! $errors->first('question_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="validator_id" class="form-label">{{ __('Validator Id') }}</label>
            <input type="text" name="validator_id" class="form-control @error('validator_id') is-invalid @enderror" value="{{ old('validator_id', $notificationsQuestion?->validator_id) }}" id="validator_id" placeholder="Validator Id">
            {!! $errors->first('validator_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tutor_id" class="form-label">{{ __('Tutor Id') }}</label>
            <input type="text" name="tutor_id" class="form-control @error('tutor_id') is-invalid @enderror" value="{{ old('tutor_id', $notificationsQuestion?->tutor_id) }}" id="tutor_id" placeholder="Tutor Id">
            {!! $errors->first('tutor_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="student_id" class="form-label">{{ __('Student Id') }}</label>
            <input type="text" name="student_id" class="form-control @error('student_id') is-invalid @enderror" value="{{ old('student_id', $notificationsQuestion?->student_id) }}" id="student_id" placeholder="Student Id">
            {!! $errors->first('student_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="study_center_id" class="form-label">{{ __('Study Center Id') }}</label>
            <input type="text" name="study_center_id" class="form-control @error('study_center_id') is-invalid @enderror" value="{{ old('study_center_id', $notificationsQuestion?->study_center_id) }}" id="study_center_id" placeholder="Study Center Id">
            {!! $errors->first('study_center_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="action" class="form-label">{{ __('Action') }}</label>
            <input type="text" name="action" class="form-control @error('action') is-invalid @enderror" value="{{ old('action', $notificationsQuestion?->action) }}" id="action" placeholder="Action">
            {!! $errors->first('action', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_read" class="form-label">{{ __('Is Read') }}</label>
            <input type="text" name="is_read" class="form-control @error('is_read') is-invalid @enderror" value="{{ old('is_read', $notificationsQuestion?->is_read) }}" id="is_read" placeholder="Is Read">
            {!! $errors->first('is_read', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
