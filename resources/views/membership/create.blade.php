@extends('layouts.app-admin')

@section('header-title')
    {{ __('Create') }} Membership
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Membership</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('memberships.index') }}"> {{ __('Atrás') }}</a>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('memberships.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('membership.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
