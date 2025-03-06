@extends('layouts.app-admin')

@section('title-header-admin')
    Membresía
@endsection

@section('content-admin')
    <div class="container-fluid">
        <a href="/pricing"> <small>Cambiar Vista</small></a>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Membresía') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('memberships.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-tables table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Duración</th>
                                        <th>Tipo</th>
                                        <th>Centro </th>
                                        <th>Límite de estudiantes</th>
                                        <th>Límite de Items</th>
                                        <th>Activado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($memberships as $membership)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                                                                       <td>{{ $membership->name }}</td>
                                            <td>{{ $membership->price }}</td>
                                            <td>{{ $membership->duration_days }}</td>
                                            <td>@if($membership->type!=null){{ $membership->type }} @else ---- @endif</td>
                                            <td>
                                                @if ($membership->is_studio_center == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td>{{ $membership->student_limit }}</td>
                                            <td>{{ $membership->limite_items }}</td>
                                            <td>
                                                @if ($membership->activated == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('memberships.destroy', $membership->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('memberships.show', $membership->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('memberships.edit', $membership->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Duración</th>
                                        <th>Tipo</th>
                                        <th>Centro </th>
                                        <th>Límite de estudiantes</th>
                                        <th>Límite de Items</th>
                                        <th>Activado</th>

                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
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
