@extends('layouts.app-admin')

@section('title-header-admin')
    Tutors
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tutors') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('tutors.create') }}" class="btn btn-primary btn-sm float-right"
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
                    @if (isset($error))
                        <div class="alert alert-danger">
                            {!! $error !!}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-tables table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th>Código</th>
                                        <th>Nombre </th>
                                        <th>Especialidad</th>
                                        <th>Centro de estudio</th>
                                        <th>Activado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($tutors as $tutor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $tutor->id }}</td>
                                            <td>{{ $tutor->person->name }}</td>
                                            <td>
                                                <td>{{ $tutor->specialty->name }}</td>

                                            </td>
                                            <td>
                                                @if ($tutor->studyCenter)
                                                    {{ $tutor->studyCenter->name }}
                                                @else
                                                    Fundación
                                                @endif
                                            </td>
                                            <td>
                                                @if ($tutor->activated == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('tutors.destroy', $tutor->id) }}" method="POST">

                                                    <div class="d-flex align-items-center list-action">
                                                        <a class="badge badge-info mr-2" data-toggle="tooltip"
                                                            data-placement="top" data-original-title=" {{ __('Show') }}"
                                                            href="{{ route('tutors.show', $tutor->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i>{{ __('Show') }}</a>
                                                        <a class="badge badge-danger mr-2" data-toggle="tooltip"
                                                            data-placement="top" data-original-title="Cambiar Contraseña "
                                                            href="{{ route('tutors.show', $tutor->id) }}"><i
                                                                class="ri-reply-line"></i> {{ __('Password') }}</a>
                                                        <a class="badge badge-success mr-2" data-toggle="tooltip"
                                                            data-placement="top" data-original-title="{{ __('Edit') }}"
                                                            href="{{ route('tutors.edit', $tutor->id) }}"><i
                                                                class="ri-pencil-line mr-0"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <a type="submit" class="badge bg-warning mr-2"
                                                            onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i
                                                                class="fa fa-fw fa-trash" data-placement="top"
                                                                data-original-title="{{ __('Edit') }}"></i>
                                                            {{ __('Delete') }}</a>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th>Código</th>
                                        <th>Nombre </th>
                                        <th>Especialidad</th>
                                        <th>Centro de estudio</th>
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
