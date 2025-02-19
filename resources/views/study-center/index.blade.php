@extends('layouts.app-admin')

@section('header-title')
    Study Centers
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Study Centers') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('study-centers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

									<th >Activated</th>
									<th >Name</th>
									<th >Address</th>
									<th >Phone</th>
									<th >Mail</th>
									<th >Tracking Code</th>
									<th >Regional Id</th>
									<th >District Id</th>
									<th >Persona</th>
									<th >Membership Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studyCenters as $studyCenter)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $studyCenter->activated }}</td>
										<td >{{ $studyCenter->name }}</td>
										<td >{{ $studyCenter->address }}</td>
										<td >{{ $studyCenter->phone }}</td>
										<td >{{ $studyCenter->mail }}</td>
										<td >{{ $studyCenter->tracking_code }}</td>
										<td >{{ $studyCenter->regional_id }}</td>
										<td >{{ $studyCenter->district_id }}</td>
										<td >{{ $studyCenter->people_id }}</td>
										<td >{{ $studyCenter->membership_id }}</td>

                                            <td>
                                                <form action="{{ route('study-centers.destroy', $studyCenter->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('study-centers.show', $studyCenter->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('study-centers.edit', $studyCenter->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $studyCenters->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
