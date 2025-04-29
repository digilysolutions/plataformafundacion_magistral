<div class="row padding-1 p-1">
    <div class="col-md-12">



        <div class="form-group col-md-12">
            <label for="question" class="form-label">{{ __('Question') }}</label>
            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror"
                value="{{ old('question', $question?->question) }}" id="question" placeholder="{{ __('Question') }}">
            {!! $errors->first('question', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-md-12">
            <label class="form-label" for="terms">Selecciona una especialidad *</label>
            <select id="specialty_id" class="form-control" name="specialty_id" required>
                @foreach ($specialties as $specialty)
                    <option value="{{ $specialty->id }}" @if ($specialty->id == $question->specialty_id) selected @endif>
                        {{ $specialty->name }}
                    </option>
                @endforeach
            </select>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-12">
            <label class="form-label" for="terms">Selecciona un Nivel *</label>
            <select id="level_id" class="form-control" name="level_id" required>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}" @if ($level->id == $question?->level_id) selected @endif>
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
            <div class="help-block with-errors"></div>
        </div>

        <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
            <input type="checkbox" class="custom-control-input bg-primary" id="customCheck-1" name="activated"
                checked="">
            <label class="custom-control-label" for="customCheck-1"> Activado</label>
        </div>
    </div>

    <hr />
    <div class="row">
        <div class="col-lg-12">
        <span class="add-answer float-right mb-3 mr-2">
            <button type="button" class="btn btn-sm bg-primary"><i class="ri-add-fill"><span class="pl-1">Adicionar Respuesta</span></i>
            </button>
        </span>
    </div>
    </div>
    <div class="new-answer row">

    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
