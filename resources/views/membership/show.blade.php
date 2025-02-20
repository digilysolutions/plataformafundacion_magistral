@extends('layouts.app-admin')

@section('header-title')
    {{ $membership->name ?? __('Mostrar') . ' ' . __('Membresía') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Membresía</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('memberships.index') }}">
                                {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">


                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $membership->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Tipo:</strong>
                            {{ $membership->type }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Precio:</strong>
                            {{ $membership->price }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Tiempo de dureación:</strong>
                            {{ $membership->duration_days }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Inicio:</strong>
                            {{ $membership->start_date }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Final:</strong>
                            {{ $membership->end_date }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>¿Centro de estudio?:</strong>

                            @if ($membership->is_studio_center == 1)
                                Si
                            @else
                                No
                            @endif
                        </div>
                        @if ($membership->is_studio_center == 1)
                            <div class="form-group mb-2 mb20">
                                <strong>Student Limit:</strong>
                                {{ $membership->student_limit }}

                            </div>
                        @endif
                        <div class="form-group mb-2 mb20">
                            <strong>Cantidad de Items:</strong>
                            {{ $membership->limite_items }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Activado:</strong>
                            @if ($membership->activated == 1)
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
