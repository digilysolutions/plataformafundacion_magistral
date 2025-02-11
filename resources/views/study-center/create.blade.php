@extends('layouts.app-admin')

@section('header-title')
    {{ __('Create') }} Study Center
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Study Center</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('study-centers.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>
                     
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('study-centers.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('study-center.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
