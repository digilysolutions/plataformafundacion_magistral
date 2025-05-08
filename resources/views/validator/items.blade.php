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
                                    <th>Competencia</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>

                            </thead>
                            <tbody>

                                <tr>
                                    <td>MA-CMR-NUM-3RO-002 </td>
                                    <td>¿Qué número completa correctamente la secuencia?</td>
                                    <td>Matemática</td>
                                    <td>CMR-NUM </td>
                                    <td><span class="badge bg-primary">Validado</span></td>

                                   <td>
                                    <a class="btn btn-sm btn-primary "
                                    href=""><i
                                        class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                   </td>

                                </tr>
                                <tr>
                                    <td> MA-CMR-NUM-3RO-011</td>
                                    <td>¿Cuál es la forma correcta de escribir el número "cuatrocientos setenta y dos" usando cifras?</td>
                                    <td>Matematica</td>
                                    <td>CMR-NUM</td>
                                    <td><span class="badge bg-warning-light">Por Validar</span></td>

                                 <td>
                                    <a class="btn btn-sm btn-primary "
                                    href=""><i
                                        class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                <a class="btn btn-sm btn-success"
                                    href="#"><i
                                        class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                 </td>
                                </tr>
                                <tr>
                                    <td>MA-CMR-NUM-3RO-012 </td>
                                    <td>¿Qué valor representa el dígito 5 en el número 853?
                                    </td>
                                    <td>Matematica</td>
                                    <td> CMR-NUM </td>
                                    <td><span class="badge bg-danger-light">Rechazado</span></td>
                                    <td>
                                            <a class="btn btn-sm btn-primary "
                                                href=""><i
                                                    class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>


                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>ITEMS</th>
                                    <th>Especialidad</th>
                                    <th>Nivel</th>
                                    <th>Estado</th>
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
