@extends('layouts.app-admin')

@section('title-header-admin')
    Students
@endsection

@section('content-admin')

        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div class="float-right mr-5">
                            <a href="{{ route('students.createStudentToStudyCenter',[$studycenters_id]) }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Nuevo') }}
                            </a>
                        </div>
                        <div style="display: flex;  align-items: center;">

                            <span id="card_title">
                                {{ __('Estudiantes') }}
                            </span>




                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if (isset($error))
                        <div class="alert alert-danger">
                            {!! $error !!}
                        </div>
                    @endif
                    <div class="float-left ml-3 mt-3">
                        <p>Utiliza el siguiente botón para cargar un archivo Excel con la información de los estudiantes.</p>
                        <a href="{{asset('ci_excel/CI-Estudiantes.xlsx')}}">Descargar Excel</a> | <a href="{{ route('import.viewStudents') }}">Carga Inicial de Estudiantes</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-tables table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th>Código</th>
                                        <th>Nombre y Apellidos</th>
                                        <th>Curso</th>
                                        <th>Centro de Estudio</th>
                                        <th>Usuario</th>
                                        <th>Membresía</th>
                                        <th>Activado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->person->name }} {{ $student->person->lastname }}</td>
                                            <td>{{ $student->course }}</td>
                                            <td>
                                                @if ($student->studyCenter)
                                                    {{ $student->studyCenter->name }}
                                                @else
                                                    No pertenece
                                                @endif
                                            </td>
                                            <td>{{ $student->person->user->name }}</td>
                                            <td>
                                                @if ($student->membership)
                                                    {{ $student->membership->name }}
                                                @else
                                                    Sin membresía
                                                @endif
                                            </td>
                                            <td>
                                                @if ($student->activated == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('students.destroyStutendToStudyCenter', [$student->id,$studycenters_id]) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('students.showStutendToStudyCenter', [$student->id,$studycenters_id]) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('students.editStutendToStudyCenter', [$student->id,$studycenters_id]) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i>
                                                        {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Código</th>
                                        <th>Nombre y Apellidos</th>
                                        <th>Curso</th>
                                        <th>Centro de Estudio</th>
                                        <th>Usuario</th>
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
@endsection
