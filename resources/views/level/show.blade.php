@extends('layouts.app-admin')

@section('header-title')
    {{ $level->name ?? __('Mostrar') . " " . __('Nivel') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Nivel</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('levels.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">


                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $level->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripción:</strong>
                                    {{ $level->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Especialidad:</strong>
                                    {{ $level->specialty->name }}
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
