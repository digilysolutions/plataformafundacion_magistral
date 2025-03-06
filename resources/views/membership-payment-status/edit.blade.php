@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Update') }} Membership Payment Status
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Membership Payment Status</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('membership-payment-statuses.index') }}"> {{ __('Atrás') }}</a>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('membership-payment-statuses.update', $membershipPaymentStatus->id) }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('membership-payment-status.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
