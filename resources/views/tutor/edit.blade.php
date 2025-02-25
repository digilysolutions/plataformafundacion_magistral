@extends('layouts.app-admin')

@section('header-title')
    {{ __('Actualizar') }} Tutor
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Tutor</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tutors.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tutors.update', $tutor->id) }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tutor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')

<!-- Validated Mail JavaScript -->
<script src="{{ asset('js/mail-validate.js') }}"></script>
@endsection
