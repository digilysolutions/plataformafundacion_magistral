@extends('layouts.app-admin')

@section('title-header-admin')
    Items Pisas
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Items Pisas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('items-pisas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Name</th>
									<th >Code</th>
									<th >Year</th>
									<th >Question</th>
									<th >Activated</th>
									<th >State</th>
									<th >Resource</th>
									<th >Ai Help</th>
									<th >Specialty Id</th>
									<th >Level Id</th>
									<th >Sublevel Id</th>
									<th >Content Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($itemsPisas as $itemsPisa)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $itemsPisa->name }}</td>
										<td >{{ $itemsPisa->code }}</td>
										<td >{{ $itemsPisa->year }}</td>
										<td >{{ $itemsPisa->question }}</td>
										<td >{{ $itemsPisa->activated }}</td>
										<td >{{ $itemsPisa->state }}</td>
										<td >{{ $itemsPisa->resource }}</td>
										<td >{{ $itemsPisa->ai_help }}</td>
										<td >{{ $itemsPisa->specialty_id }}</td>
										<td >{{ $itemsPisa->level_id }}</td>
										<td >{{ $itemsPisa->sublevel_id }}</td>
										<td >{{ $itemsPisa->content_id }}</td>

                                            <td>
                                                <form action="{{ route('items-pisas.destroy', $itemsPisa->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('items-pisas.show', $itemsPisa->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('items-pisas.edit', $itemsPisa->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                                  
									<th >Name</th>
									<th >Code</th>
									<th >Year</th>
									<th >Question</th>
									<th >Activated</th>
									<th >State</th>
									<th >Resource</th>
									<th >Ai Help</th>
									<th >Specialty Id</th>
									<th >Level Id</th>
									<th >Sublevel Id</th>
									<th >Content Id</th>

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
