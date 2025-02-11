@extends('layouts.app-admin')

@section('header-title')
    {{ $student->name ?? __('Show') . " " . __('Student') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Student</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('students.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    {{ $student->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Persona:</strong>
                                    {{ $student->people_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Course:</strong>
                                    {{ $student->course }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Studycenters Id:</strong>
                                    {{ $student->studycenters_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $student->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Membership Id:</strong>
                                    {{ $student->membership_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
