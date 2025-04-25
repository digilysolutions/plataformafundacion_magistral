@extends('layouts.app-admin')

@section('title-header-admin')
    Notifications Questions
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Notifications Questions') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('notifications-questions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Question Id</th>
									<th >Validator Id</th>
									<th >Tutor Id</th>
									<th >Student Id</th>
									<th >Study Center Id</th>
									<th >Action</th>
									<th >Is Read</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($notificationsQuestions as $notificationsQuestion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $notificationsQuestion->question_id }}</td>
										<td >{{ $notificationsQuestion->validator_id }}</td>
										<td >{{ $notificationsQuestion->tutor_id }}</td>
										<td >{{ $notificationsQuestion->student_id }}</td>
										<td >{{ $notificationsQuestion->study_center_id }}</td>
										<td >{{ $notificationsQuestion->action }}</td>
										<td >{{ $notificationsQuestion->is_read }}</td>

                                            <td>
                                                <form action="{{ route('notifications-questions.destroy', $notificationsQuestion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('notifications-questions.show', $notificationsQuestion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('notifications-questions.edit', $notificationsQuestion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                                  
									<th >Question Id</th>
									<th >Validator Id</th>
									<th >Tutor Id</th>
									<th >Student Id</th>
									<th >Study Center Id</th>
									<th >Action</th>
									<th >Is Read</th>

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
