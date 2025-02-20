@extends('layouts.app-admin')

@section('header-title')
    {{ $specialty->name ?? __('Mostrar') . ' ' . __('Espeialidades') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Especialidades</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('specialties.index') }}">
                                {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group mb-2 mb20">
                            <strong>Código:</strong>
                            {{ $specialty->id }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $specialty->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Activado:</strong>
                            @if ($specialty->activated == 1)
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
