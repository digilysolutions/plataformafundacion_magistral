@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $answer->name ?? __('Show') . " " . __('Answer') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Answer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('answers.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Question Id:</strong>
                                    {{ $answer->question_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Answer:</strong>
                                    {{ $answer->answer }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Correct:</strong>
                                    {{ $answer->is_correct }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
