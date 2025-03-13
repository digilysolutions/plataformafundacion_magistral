@extends('layouts.app-admin')

@section('title-header-admin')
    Regionales
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Regional') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('regionals.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Código</th>
                                        <th>Regional</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                        <th>Activado</th>
                                        <th></th>
                                    </tr>
                                 </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($regionals as $regional)
                                        <tr>
                                            <td>{{ $regional->code }}</td>
                                            <td>{{ $regional->id }}</td>
                                            <td>{{ $regional->name }}</td>
                                            <td>{{ $regional->phone }}</td>
                                            <td>{{ $regional->mail }}</td>
                                            <td>
                                                @if ($regional->activated == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('regionals.destroy', $regional->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('regionals.show', $regional->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('regionals.edit', $regional->id) }}"><i
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
                                        <th>Regional</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
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
