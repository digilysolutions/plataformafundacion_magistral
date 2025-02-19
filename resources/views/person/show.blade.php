@extends('layouts.app-admin')

@section('header-title')
    {{ $person->name ?? __('Show') . ' ' . __('Person') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Person</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('people.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    @if ($message != null)
                        <p>{{ $message }}</p>
                    @else
                        <div class="card-body bg-white">

                            <div class="form-group mb-2 mb20">
                                <strong>Activado:</strong>
                                {{ $person->activated }}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <strong>Name:</strong>
                                {{ $person->name }}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <strong>Lastname:</strong>
                                {{ $person->lastname }}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <strong>Email:</strong>
                                {{ $person->email }}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <strong>Phone:</strong>
                                {{ $person->phone }}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <strong>Tracking Code:</strong>
                                {{ $person->tracking_code }}
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
