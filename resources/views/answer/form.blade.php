<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="question_id" class="form-label">{{ __('Question Id') }}</label>
            <input type="text" name="question_id" class="form-control @error('question_id') is-invalid @enderror" value="{{ old('question_id', $answer?->question_id) }}" id="question_id" placeholder="Question Id">
            {!! $errors->first('question_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="answer" class="form-label">{{ __('Answer') }}</label>
            <input type="text" name="answer" class="form-control @error('answer') is-invalid @enderror" value="{{ old('answer', $answer?->answer) }}" id="answer" placeholder="Answer">
            {!! $errors->first('answer', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_correct" class="form-label">{{ __('Is Correct') }}</label>
            <input type="text" name="is_correct" class="form-control @error('is_correct') is-invalid @enderror" value="{{ old('is_correct', $answer?->is_correct) }}" id="is_correct" placeholder="Is Correct">
            {!! $errors->first('is_correct', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
