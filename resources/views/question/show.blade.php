@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $question->name ?? __('Show') . ' ' . __('Question') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} {{__("Question")}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('questions.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group mb-2 mb20">
                            <strong>Código:</strong>
                            {{ $question->id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Especialidad:</strong>
                            {{ $question->specialty->names }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nivel:</strong>
                            {{ $question->level->name }}
                        </div>
                        <div class="form-group mb-2 mb20">


                            <h3>Respuestas:</h3>
                            <ul>
                                @foreach ($question->answers as $answer)
                                    <li>{{ $answer->answer }} @if ($answer->is_correct)
                                            (Correcto)
                                        @endif
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
