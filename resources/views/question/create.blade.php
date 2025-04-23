@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Crear') }} {{ __('Question') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} {{ __('Question') }}</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('questions.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('questions.store') }}" role="form" enctype="multipart/form-data" data-toggle="validator">
                            @csrf

                            <div class="row padding-1 p-1">
                                <div class="col-md-12">

                                    <div class="form-group col-md-12">
                                        <label for="question" class="form-label">{{ __('Pregunta') }}</label>
                                        <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" id="question" placeholder="{{ __('Ingrese la pregunta') }}" value="{{ old('question') }}">
                                        @error('question')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="specialty_id">{{ __('Selecciona una especialidad *') }}</label>
                                        <select id="specialty_id" class="form-control" name="specialty_id" required>
                                            @foreach ($specialties as $specialty)
                                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="level_id">{{ __('Selecciona un Nivel *') }}</label>
                                        <select id="level_id" class="form-control" name="level_id" required>
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                        <input type="checkbox" class="custom-control-input bg-primary" id="activated" name="activated" checked>
                                        <label class="custom-control-label" for="activated">{{ __('Activado') }}</label>
                                    </div>

                                    <hr />
                                    <h5>{{ __('Respuestas') }}</h5>
                                    <h6>{{ __('Por favor, añade las respuestas correspondientes a la pregunta. Asegúrate de marcar solo la respuesta como correcta.') }}</h6>

                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <span class="add-answer float-right">
                                                <button type="button" class="btn btn-sm bg-primary"><i class="ri-add-fill"></i> {{ __('Adicionar Respuesta') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="new-answer"></div>

                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        let answerCount = 0;

        const newInputAnswer = (index) => `
        <div class="form-group answer-item col-md-12" id="answer-item-${index}">
            <div class="input-group mb-2">
                <input type="text" name="answers[${index}][answer]" class="form-control" placeholder="{{ __('Respuesta') }}">
                <div class="input-group-append">
                    <button class="btn btn-danger remove-answer" type="button">Eliminar</button>
                </div>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="correct_answer" value="${index}" id="correctAnswer${index}">
                <label for="correctAnswer${index}" class="form-check-label">{{ __('Correcta') }}</label>
            </div>
        </div>`;

        $('.add-answer').on('click', function() {
            $('.new-answer').append(newInputAnswer(answerCount));
            answerCount++;
        });

        $(document).on('click', '.remove-answer', function() {
            $(this).closest('.answer-item').remove();
        });
    </script>
@endsection
