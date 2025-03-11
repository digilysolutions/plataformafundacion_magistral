@extends('layouts.app-admin')

@section('title-header-admin')
    Exámenes
@endsection

@section('content-admin')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                             {{$name}}
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
                                    <th>No</th>
                                    <th>Código</th>
                                    <th>Items </th>
                                    <th>Especialidad</th>
                                    <th>Nivel</th>
                                    <th>Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr class="ligth">
                                    <th>No</th>
                                    <th>Código</th>
                                    <th>Items </th>
                                    <th>Especialidad</th>
                                    <th>Nivel</th>
                                    <th>Puntuación</th>
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