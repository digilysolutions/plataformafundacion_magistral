@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $membershipFeature->name ?? __('Mostrar') . " " . __('Características de la Membresía') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Características de la Membresía</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('membership-features.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $membershipFeature->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripción:</strong>
                                    {{ $membershipFeature->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    @if ($membershipFeature->activated == 1)
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
