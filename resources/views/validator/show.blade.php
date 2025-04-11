@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $validator->name ?? __('Show') . " " . __('Validator') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Validador</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('validators.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $validator->person->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellidos:</strong>
                                    {{ $validator->person->lastname }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Especialidad:</strong>
                                    {{ $validator->specialty->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Activated:</strong>
                                    {{ $validator->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>People Id:</strong>
                                    {{ $validator->people_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
