@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $course->name ?? __('Show') . " " . __('Course') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Course</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('courses.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $course->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Activated:</strong>
                                    {{ $course->activated }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
