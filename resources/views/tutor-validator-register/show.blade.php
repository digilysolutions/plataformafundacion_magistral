@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $tutorValidatorRegister->name ?? __('Show') . " " . __('Tutor Validator Register') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Tutor Validator Register</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tutor-validator-registers.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $tutorValidatorRegister->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lastname:</strong>
                                    {{ $tutorValidatorRegister->lastname }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mail:</strong>
                                    {{ $tutorValidatorRegister->mail }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Phone:</strong>
                                    {{ $tutorValidatorRegister->phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Type:</strong>
                                    {{ $tutorValidatorRegister->type }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>State:</strong>
                                    {{ $tutorValidatorRegister->state }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verification Token:</strong>
                                    {{ $tutorValidatorRegister->verification_token }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Verification Code:</strong>
                                    {{ $tutorValidatorRegister->verification_code }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
