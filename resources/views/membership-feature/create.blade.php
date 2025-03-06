@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Crear') }} Características de la Membresía
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Características de la Membresía</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('membership-features.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('membership-features.store') }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            @csrf

                            @include('membership-feature.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
