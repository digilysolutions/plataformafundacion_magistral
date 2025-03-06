@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $membershipPaymentStatus->name ?? __('Show') . " " . __('Membership Payment Status') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Membership Payment Status</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('membership-payment-statuses.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    {{ $membershipPaymentStatus->activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $membershipPaymentStatus->name }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
