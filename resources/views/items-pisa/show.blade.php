@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $itemsPisa->name ?? __('Show') . " " . __('Items Pisa') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Items Pisa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('items-pisas.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $itemsPisa->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Code:</strong>
                                    {{ $itemsPisa->code }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Year:</strong>
                                    {{ $itemsPisa->year }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Question:</strong>
                                    {{ $itemsPisa->question }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Activated:</strong>
                                    {{ $itemsPisa->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>State:</strong>
                                    {{ $itemsPisa->state }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Resource:</strong>
                                    {{ $itemsPisa->resource }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ai Help:</strong>
                                    {{ $itemsPisa->ai_help }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Specialty Id:</strong>
                                    {{ $itemsPisa->specialty_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Level Id:</strong>
                                    {{ $itemsPisa->level_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sublevel Id:</strong>
                                    {{ $itemsPisa->sublevel_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Content Id:</strong>
                                    {{ $itemsPisa->content_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
