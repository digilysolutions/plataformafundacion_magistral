@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Actualizar') }} Course
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
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
                        <span class="card-title">{{ __('Actualizar') }} Course</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('courses.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('courses.update', $course->id) }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('course.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
