@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $answersPisa->name ?? __('Show') . " " . __('Answers Pisa') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Answers Pisa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('answers-pisas.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $answersPisa->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Answer:</strong>
                                    {{ $answersPisa->answer }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Correct:</strong>
                                    {{ $answersPisa->is_correct }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Activated:</strong>
                                    {{ $answersPisa->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Itempisa Id:</strong>
                                    {{ $answersPisa->itempisa_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
