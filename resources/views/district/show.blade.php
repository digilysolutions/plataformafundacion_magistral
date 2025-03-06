@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $district->name ?? __('Show') . " " . __('District') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Distrito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('districts.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">


                                <div class="form-group mb-2 mb20">
                                    <strong>Código:</strong>
                                    {{ $district->id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $district->name }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Dirección:</strong>
                                    {{ $district->address }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Teléfono:</strong>
                                    {{ $district->phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo:</strong>
                                    {{ $district->mail }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Regional:</strong>
                                    {{ $district->regional->name }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    @if ($district->activated == 1)
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
