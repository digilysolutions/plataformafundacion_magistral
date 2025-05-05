@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $studyCenter->name ?? __('Mostrar') . ' ' . __('Centro de estudio') }}
@endsection

@section('content-admin')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="card-title">{{ __('Mostrar') }} Centro de Estudio</span>
                    <a class="btn btn-primary btn-sm" href="{{ route('study-centers.index') }}">
                        {{ __('Atrás') }}
                    </a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body bg-white">

                    <div class="form-group mb-3">
                        <strong>Usuario:</strong>

                        {{ $studyCenter->person?->user->email ?? 'No disponible' }}
                    </div>

                    @if (!empty($password))
                        <div class="form-group mb-3">
                            <strong>Contraseña:</strong>
                            {{ $password }}
                            <p class="mb-0">
                                <small>La contraseña solo se mostrará una vez.</small>
                            </p>
                        </div>
                    @endif

                    <div class="form-group mb-3">
                        <strong>Código de seguimiento:</strong>
                        {{ $studyCenter->id }}
                    </div>

                    <hr>

                    <div class="form-group mb-3">
                        <strong>Centro:</strong>
                        {{ $studyCenter->name ?? 'No disponible' }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Dirección:</strong>
                        {{ $studyCenter->address ?? 'No disponible' }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Teléfono:</strong>
                        {{ $studyCenter->phone ?? 'No disponible' }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Correo:</strong>
                        {{ $studyCenter->mail ?? 'No disponible' }}
                    </div>

                    <div class="form-group mb-3">
                        <strong>Regional:</strong>
                        {{ $studyCenter->regional->name ?? 'No disponible' }}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Distrito:</strong>
                        {{ $studyCenter->district->name ?? 'No disponible' }}
                    </div>

                    @if ($studyCenter->person)
                        <div class="form-group mb-3">
                            <strong>Persona encargada:</strong>
                            {{ $studyCenter->person->name ?? 'No disponible' }} {{ $studyCenter->person->lastname ?? '' }}
                        </div>
                    @endif

                    <div class="form-group mb-3">
                        <strong>Membresía:</strong>
                        {{ $studyCenter->membership->name ?? 'No disponible' }}
                    </div>

                    <div class="form-group mb-3">
                        <strong>Activado:</strong>
                        {{ $studyCenter->activated ? 'Sí' : 'No' }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
