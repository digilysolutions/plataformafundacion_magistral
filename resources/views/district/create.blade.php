@extends('layouts.app-admin')

@section('header-title')
    {{ __('Create') }} District
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} District</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('levels.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('districts.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('district.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
