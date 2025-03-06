@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Actualizar') }} Membresía
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Membresía</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('memberships.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('memberships.update', $membership->id) }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('membership.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        // Función para habilitar/deshabilitar el input de cantidad de estudiantes
        $('#customCheck5').change(function() {
            if ($(this).is(':checked')) {
                $('#student_limit').prop('disabled', false); // Habilita el input
            } else {
                $('#student_limit').prop('disabled', true); // Deshabilita el input
                $('#student_limit').val(''); // Opcional: Limpia el valor
            }
        });
    });
    </script>
@endsection
