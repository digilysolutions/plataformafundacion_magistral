@extends('layouts.app-admin')

@section('header-title')
    {{ $level->name ?? __('Show') . " " . __('Level') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Level</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('levels.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    {{ $level->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $level->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Description:</strong>
                                    {{ $level->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Specialty Id:</strong>
                                    {{ $level->specialty_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
