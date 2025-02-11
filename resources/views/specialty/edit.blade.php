@extends('layouts.app-admin')

@section('header-title')
    {{ __('Update') }} Specialty
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Specialty</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('specialties.update', $specialty->id) }}"  role="form" enctype="multipart/form-data">
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
