



@extends('layouts.app-admin')


@section('header-title')
    People
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('People') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('people.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Lastname</th>
									<th >Email</th>
									<th >Phone</th>
									<th >Tracking Code</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($people as $person)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $person->activated }}</td>
										<td >{{ $person->name }}</td>
										<td >{{ $person->lastname }}</td>
										<td >{{ $person->email }}</td>
										<td >{{ $person->phone }}</td>
										<td >{{ $person->tracking_code }}</td>

                                            <td>
                                                <form action="{{ route('people.destroy', $person->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('people.show', $person->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('people.edit', $person->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $people->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
