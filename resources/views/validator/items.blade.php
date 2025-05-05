@extends('layouts.app-admin')

@section('title-header-admin')
    Validadores
@endsection

@section('content-admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Items') }}
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-tables table-striped">
                            <thead>
                                <tr class="ligth">
                                    <th>Código</th>
                                    <th>ITEMS</th>
                                    <th>Especialidad</th>
                                    <th>Nivel</th>
                                    <th>Estado</th>
                                </tr>

                            </thead>
                            <tbody>

                                <tr>
                                    <td>ES-147</td>
                                    <td>Nombre Item</td>
                                    <td>Español</td>
                                    <td>Nivel 2</td>
                                    <td><span class="badge bg-primary">Validado</span></td>
                                </tr>
                                <tr>
                                    <td>ES-148</td>
                                    <td>Nombte Item</td>
                                    <td>Matematica</td>
                                    <td>Nivel 1</td>
                                    <td><span class="badge bg-warning-light">Por Validar</span></td>
                                </tr>
                                <tr>
                                    <td>ES-149</td>
                                    <td>Nombte Item</td>
                                    <td>Matematica</td>
                                    <td>Nivel 3</td>
                                    <td><span class="badge bg-danger-light">Rechazado</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>ITEMS</th>
                                    <th>Especialidad</th>
                                    <th>Nivel</th>
                                    <th>Estado</th>

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
