@extends('layouts.app-admin')

@section('header-title')
    {{ $country->name ?? __('Mostrar') . ' ' . __('País') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} País</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('countries.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre del País:</strong>
                            {{ $country->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Activado:</strong>
                            @if ($country->activated == 1)
                                Si
                            @else
                                No
                            @endif
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
