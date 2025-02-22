@extends('layouts.app-admin')

@section('header-title')
    {{ __('Create') }} Specialty
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Especialidad</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('specialties.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('specialties.store') }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            @csrf

                            @include('specialty.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
