@extends('layouts.app-admin')

@section('header-title')
    {{ $tutor->name ?? __('Show') . " " . __('Tutor') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Tutor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tutors.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    {{ $tutor->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $tutor->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Persona:</strong>
                                    {{ $tutor->people_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Specialty Id:</strong>
                                    {{ $tutor->specialty_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
