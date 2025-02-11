@extends('layouts.app-admin')

@section('header-title')
    {{ $regional->name ?? __('Show') . " " . __('Regional') }}
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
                                    <strong>Name:</strong>
                                    {{ $regional->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Address:</strong>
                                    {{ $regional->address }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Phone:</strong>
                                    {{ $regional->phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mail:</strong>
                                    {{ $regional->mail }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tracking Code:</strong>
                                    {{ $regional->tracking_code }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
