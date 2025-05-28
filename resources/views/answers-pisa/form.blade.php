<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $answersPisa?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="answer" class="form-label">{{ __('Answer') }}</label>
            <input type="text" name="answer" class="form-control @error('answer') is-invalid @enderror" value="{{ old('answer', $answersPisa?->answer) }}" id="answer" placeholder="Answer">
            {!! $errors->first('answer', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_correct" class="form-label">{{ __('Is Correct') }}</label>
            <input type="text" name="is_correct" class="form-control @error('is_correct') is-invalid @enderror" value="{{ old('is_correct', $answersPisa?->is_correct) }}" id="is_correct" placeholder="Is Correct">
            {!! $errors->first('is_correct', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="activated" class="form-label">{{ __('Activated') }}</label>
            <input type="text" name="activated" class="form-control @error('activated') is-invalid @enderror" value="{{ old('activated', $answersPisa?->activated) }}" id="activated" placeholder="Activated">
            {!! $errors->first('activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="itempisa_id" class="form-label">{{ __('Itempisa Id') }}</label>
            <input type="text" name="itempisa_id" class="form-control @error('itempisa_id') is-invalid @enderror" value="{{ old('itempisa_id', $answersPisa?->itempisa_id) }}" id="itempisa_id" placeholder="Itempisa Id">
            {!! $errors->first('itempisa_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
