@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Crear') }} Estudiante
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('error'))
                    <div class="alert alert-danger m-4">
                        {!! session('error') !!}
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
                        <span class="card-title">{{ __('Crear') }} Estudiante</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('students.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('students.store') }}" role="form"
                            enctype="multipart/form-data" data-toggle="validator">
                            @csrf

                            @include('student.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <!-- Validated Mail JavaScript -->
    <script src="{{ asset('js/icon-eyes-password.js') }}"></script>
@endsection

