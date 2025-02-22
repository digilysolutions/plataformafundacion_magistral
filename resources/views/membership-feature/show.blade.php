@extends('layouts.app-admin')

@section('header-title')
    {{ $membershipFeature->name ?? __('Show') . " " . __('Membership Feature') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Membership Feature</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('membership-features.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $membershipFeature->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Description:</strong>
                                    {{ $membershipFeature->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Activated:</strong>
                                    {{ $membershipFeature->activated }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
