@extends('layouts.app-admin')

@section('header-title')
    {{ $membershipFeaturesMembership->name ?? __('Show') . " " . __('Membership Features Membership') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Membership Features Membership</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('membership-features-memberships.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Membership Id:</strong>
                                    {{ $membershipFeaturesMembership->membership_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Membership Feature Id:</strong>
                                    {{ $membershipFeaturesMembership->membership_feature_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Value:</strong>
                                    {{ $membershipFeaturesMembership->value }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
