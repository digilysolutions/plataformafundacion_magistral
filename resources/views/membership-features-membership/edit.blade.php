@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Actualizar') }} Membership Features Membership
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Membership Features Membership</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('membership-features-memberships.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('membership-features-memberships.update', $membershipFeaturesMembership->id) }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('membership-features-membership.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
