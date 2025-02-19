@extends('layouts.app-admin')

@section('header-title')
    {{ $membership->name ?? __('Show') . " " . __('Membership') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Membership</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('memberships.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    {{ $membership->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $membership->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Price:</strong>
                                    {{ $membership->price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Duration Days:</strong>
                                    {{ $membership->duration_days }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Studio Center:</strong>
                                    {{ $membership->is_studio_center }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Student Limit:</strong>
                                    {{ $membership->student_limit }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Limite Items:</strong>
                                    {{ $membership->limite_items }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
