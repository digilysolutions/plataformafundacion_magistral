@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $sublevel->name ?? __('Show') . " " . __('Sublevel') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Sublevel</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('sublevels.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Activated:</strong>
                                    {{ $sublevel->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $sublevel->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Shortname:</strong>
                                    {{ $sublevel->shortname }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Description:</strong>
                                    {{ $sublevel->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Level Id:</strong>
                                    {{ $sublevel->level_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
