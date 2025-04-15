@extends('layouts.app-admin')

@section('title-header-admin')
    Register Study Centers
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Solicitudes de Registro de los Centros de Estudios') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('register-study-centers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

									<th >{{__('Name')}}</th>
									<th >{{__('Email')}}</th>
									<th >{{__('State')}}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($registerStudyCenters as $registerStudyCenter)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $registerStudyCenter->name }}</td>
										<td >{{ $registerStudyCenter->mail }}</td>
										<td >{{ $registerStudyCenter->state }}</td>

                                            <td>
                                                <form action="{{ route('register-study-centers.destroy', $registerStudyCenter->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('register-study-centers.show', $registerStudyCenter->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('register-study-centers.edit', $registerStudyCenter->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                  <tfoot>
                                 <tr>
                                 <th>No</th>

                                 <th >{{__('Name')}}</th>
                                 <th >{{__('Email')}}</th>
                                 <th >{{__('State')}}</th>

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
