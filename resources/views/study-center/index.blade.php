@extends('layouts.app-admin')

@section('title-header-admin')
    Centros de Estudios
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
            @endif
            
            @if ($errors->any())
                <div class="alert alert-danger m-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                           
                            <span id="card_title">
                                {{ __('Centros de Estudios') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('study-centers.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="float-left ml-3 mt-3">
                        <a href="{{ route('register-study-centers.index') }}">Solicitudes de registro</a> |
                    </div>
                    <div class="card-body bg-white">

                        <div class="table-responsive">

                            <table id="datatable" class="table data-tables table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>

                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Regional</th>
                                        <th>Distrito</th>
                                        <th>Membresía</th>
                                        <th>Activado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($studyCenters as $studyCenter)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $studyCenter->id }}</td>
                                            <td>{{ $studyCenter->name }}</td>
                                            <td>{{ $studyCenter->regional->name }}</td>
                                            <td>{{ $studyCenter->district->name }}</td>
                                            <td>{{ $studyCenter->membership->name }}</td>
                                            <td>
                                                @if ($studyCenter->activated == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('study-centers.destroy', $studyCenter->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('study-centers.show', $studyCenter->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('study-centers.edit', $studyCenter->id) }}"><i
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

                                        <th>Código</th>
                                        <th>Nombre</th>

                                        <th>Regional</th>
                                        <th>Distrito</th>
                                        <th>Membresía</th>
                                        <th>Activado</th>
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
