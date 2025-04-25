@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $notificationsQuestion->name ?? __('Show') . " " . __('Notifications Question') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Notifications Question</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('notifications-questions.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Question Id:</strong>
                                    {{ $notificationsQuestion->question_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Validator Id:</strong>
                                    {{ $notificationsQuestion->validator_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tutor Id:</strong>
                                    {{ $notificationsQuestion->tutor_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Student Id:</strong>
                                    {{ $notificationsQuestion->student_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Study Center Id:</strong>
                                    {{ $notificationsQuestion->study_center_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Action:</strong>
                                    {{ $notificationsQuestion->action }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Read:</strong>
                                    {{ $notificationsQuestion->is_read }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
