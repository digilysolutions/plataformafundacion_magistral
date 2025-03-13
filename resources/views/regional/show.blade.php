@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $regional->name ?? __('Show') . ' ' . __('Regional') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Regional</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('regionals.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group mb-2 mb20">
                            <strong>No:</strong>
                            {{ $regional->code }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Código de seguimiento:</strong>
                            {{ $regional->id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Regional:</strong>
                            {{ $regional->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Dirección:</strong>
                            {{ $regional->address }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Teléfono:</strong>
                            {{ $regional->phone }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Correo:</strong>
                            {{ $regional->mail }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>País:</strong>
                            {{ $regional->country->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Activado:</strong>
                            @if ($regional->activated == 1)
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
