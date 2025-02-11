@extends('layouts.app-admin')

@section('header-title')
    {{ __('Update') }} Level
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Level</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('levels.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('levels.update', $level->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('level.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
