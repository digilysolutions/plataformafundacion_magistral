@extends('layouts.app-admin')

@section('header-title')
    {{ $district->name ?? __('Show') . " " . __('District') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} District</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('districts.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    {{ $district->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $district->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tracking Code:</strong>
                                    {{ $district->tracking_code }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Address:</strong>
                                    {{ $district->address }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Phone:</strong>
                                    {{ $district->phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mail:</strong>
                                    {{ $district->mail }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Regional Id:</strong>
                                    {{ $district->regional_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
