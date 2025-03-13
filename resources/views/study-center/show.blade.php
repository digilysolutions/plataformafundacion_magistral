@extends('layouts.app-admin')

@section('title-header-admin')
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Usuario:</strong>
                            {{ $studyCenter->person?->user->email }}
                        </div>
                        @if (isset($password) && $password != null)
                            <div class="form-group mb-2 mb20">
                                <strong>Contraseña:</strong>
                                {{ $password }}
                                <p class="mb-0">  <small>La contraseña solo se le mostrará una vez.</small></p>

                            </div>

                        @endif
                        <div class="form-group mb-2 mb20">
                            <strong>Código de seguimiento:</strong>
                            {{ $studyCenter->id }}
                        </div>
                        <hr>


                        <div class="form-group mb-2 mb20">
                            <strong>Centro:</strong>
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
                                {{ $studyCenter->person?->name }} {{ $studyCenter->person->lastname }}
                            </div>
                        @endif
                        <div class="form-group mb-2 mb20">
                            <strong>Membresía:</strong>
                            {{ $studyCenter->membership->name }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Activado:</strong>
                            @if ($studyCenter->activated == 1)
                                Si
                            @else
                                No
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
