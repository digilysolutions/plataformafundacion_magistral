@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $membershipHistory->name ?? __('Show') . " " . __('Membership History') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Membership History</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('membership-histories.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $membershipHistory->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Membership Id:</strong>
                                    {{ $membershipHistory->membership_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Start Date:</strong>
                                    {{ $membershipHistory->start_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>End Date:</strong>
                                    {{ $membershipHistory->end_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Status:</strong>
                                    {{ $membershipHistory->status }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Message:</strong>
                                    {{ $membershipHistory->message }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
