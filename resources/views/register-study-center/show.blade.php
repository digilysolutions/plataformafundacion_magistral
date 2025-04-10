@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $registerStudyCenter->name ?? __('Show') . " " . __('Register Study Center') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Register Study Center</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('register-study-centers.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $registerStudyCenter->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mail:</strong>
                                    {{ $registerStudyCenter->mail }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>State:</strong>
                                    {{ $registerStudyCenter->state }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
