@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Actualizar') }} Centro de Estudio
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Centro de Estudio</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('study-centers.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('study-centers.update', $studyCenter->id) }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            @csrf
                            @method('PATCH')
                            @include('study-center.form_update')

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
<script src="{{ asset('js/icon-eyes-password.js') }}"></script>
<!-- Validated Mail JavaScript -->
<script src="{{ asset('js/mail-validate.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#regional_id').change(function() {
                var regionalId = $(this).val();

                if (regionalId) {
                    // Realiza una solicitud AJAX para obtener los distritos
                    $.ajax({
                        url: '/distritos/' + regionalId,
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            // Limpia las opciones previas
                            $('#district_id').empty();
                            $('#district_id').append(
                                '<option value="">Selecciona un distrito</option>');

                            // Recorre los distritos y los agrega al select
                            $.each(data, function(key, district) {
                                $('#district_id').append('<option value="' + district
                                    .id + '">' + district.name + '</option>');
                            });

                            // Muestra el select de distritos solo si hay distritos disponibles
                            $('#districtGroup').show();
                        },
                        error: function() {
                            // Maneja el error de la solicitud
                            alert('Ocurrió un error al obtener los distritos.');
                        }
                    });
                } else {
                    // Si no hay regional seleccionada, oculta el select de distritos
                    $('#district_id').empty();
                    $('#districtGroup').hide();
                }
            });
        });
    </script>
@endsection
