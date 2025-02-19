@extends('layouts.app-admin')

@section('header-title')
    {{ __('Update') }} Regional
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Regional</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('regionals.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('regionals.update', $regional->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('regional.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
