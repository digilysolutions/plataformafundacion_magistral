@extends('layouts.app-admin')

@section('header-title')
    {{ $studyCenter->name ?? __('Mostrar') . ' ' . __('Centro de estudio') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Centro de estudio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('study-centers.index') }}">
                                {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Código:</strong>
                            {{ $studyCenter->id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $studyCenter->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Dirección:</strong>
                            {{ $studyCenter->address }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Teléfono:</strong>
                            {{ $studyCenter->phone }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Correo:</strong>
                            {{ $studyCenter->mail }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Regional:</strong>
                            {{ $studyCenter->regional->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Distrito:</strong>
                            {{ $studyCenter->district->name }}
                        </div>
                        @if ($studyCenter->person != null)
                            <div class="form-group mb-2 mb20">
                                <strong>Persona encargada:</strong>
                                {{ $studyCenter->person->name }}
                            </div>
                        @endif
                        <div class="form-group mb-2 mb20">
                            <strong>Membresía:</strong>
                            {{ $studyCenter->membership->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
