@extends('layouts.app-admin')

@section('title-header-admin')
    Answers
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Answers') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('answers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Answer</th>
									<th >Is Correct</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($answers as $answer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $answer->question_id }}</td>
										<td >{{ $answer->answer }}</td>
										<td >{{ $answer->is_correct }}</td>

                                            <td>
                                                <form action="{{ route('answers.destroy', $answer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('answers.show', $answer->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('answers.edit', $answer->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
									<th >Answer</th>
									<th >Is Correct</th>

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
