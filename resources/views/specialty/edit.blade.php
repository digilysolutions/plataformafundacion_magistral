@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Actualizar') }} Especialidad
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Especialidad</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('specialties.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('specialties.update', $specialty->id) }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('specialty.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
