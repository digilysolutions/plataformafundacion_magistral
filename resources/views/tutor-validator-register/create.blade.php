@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Crear') }} Tutor Validator Register
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Tutor Validator Register</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tutor-validator-registers.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tutor-validator-registers.store') }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            @csrf

                            @include('tutor-validator-register.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
