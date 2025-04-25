@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Actualizar') }} Tutor
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">@if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
<script src="{{ asset('js/icon-eyes-password.js') }}">
@endsection
