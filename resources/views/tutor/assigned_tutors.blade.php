@extends('layouts.app-admin')

@section('title-header-admin')
    Panel Tutor
@endsection

@section('content-admin')



    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table data-tables table-striped">
                <thead>
                    <tr class="ligth">
                        <th>Especialidad</th>
                <th>Nombre</th>
                <th>Estado de Asignación</th>
                <th>Estado de Solicitud</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Matemática</td>
                        <td>Juan Pérez</td>
                        <td>Asignado</td>
                        <td>Confirmado</td>
                    </tr>
                    <tr>
                        <td>Español</td>
                        <td>María Gómez</td>
                        <td>No asignado</td>
                        <td>Solicitado</td>
                    </tr>
                    <tr>
                        <td>Ciencias Sociales</td>
                        <td>Carlos López</td>
                        <td>Asignado</td>
                        <td>Confirmado</td>
                    </tr>
                    <tr>
                        <td>Ciencias Naturales</td>
                        <td>Laura Ramírez</td>
                        <td>No asignado</td>
                        <td>Pendiente</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Especialidad</th>
                        <th>Nombre</th>
                        <th>Estado de Asignación</th>
                        <th>Estado de Solicitud</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
@endsection
