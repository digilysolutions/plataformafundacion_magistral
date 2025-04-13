@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $tutor->name ?? __('Mostrar') . ' ' . __('Tutor') }}
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
                            <strong>Código:</strong>
                            {{ $tutor->id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre y Apellidos:</strong>
                            {{ $tutor->person->name }} {{ $tutor->person->lastname }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Teléfono:</strong>
                          {{$tutor->person->phone}}

                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Correo:</strong>
                          {{$tutor->person->email}}

                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Especialidad:</strong>
                            {{ $tutor->specialty->name }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Activado:</strong>
                            @if ($tutor->activated == 1)
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
