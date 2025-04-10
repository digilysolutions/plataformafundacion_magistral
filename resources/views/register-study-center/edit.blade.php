@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Actualizar') }} Register Study Center
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Register Study Center</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('register-study-centers.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('register-study-centers.update', $registerStudyCenter->id) }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('register-study-center.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
