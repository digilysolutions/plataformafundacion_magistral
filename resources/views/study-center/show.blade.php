@extends('layouts.app-admin')

@section('header-title')
    {{ $studyCenter->name ?? __('Show') . " " . __('Study Center') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Study Center</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('study-centers.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    {{ $studyCenter->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $studyCenter->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Address:</strong>
                                    {{ $studyCenter->address }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Phone:</strong>
                                    {{ $studyCenter->phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mail:</strong>
                                    {{ $studyCenter->mail }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tracking Code:</strong>
                                    {{ $studyCenter->tracking_code }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Regional Id:</strong>
                                    {{ $studyCenter->regional_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>District Id:</strong>
                                    {{ $studyCenter->district_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Persona:</strong>
                                    {{ $studyCenter->people_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Membership Id:</strong>
                                    {{ $studyCenter->membership_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
