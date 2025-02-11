@extends('layouts.app-admin')

@section('header-title')
    Tutors
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tutors') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tutors.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Persona</th>
									<th >Specialty Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tutors as $tutor)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $tutor->activated }}</td>
										<td >{{ $tutor->name }}</td>
										<td >{{ $tutor->people_id }}</td>
										<td >{{ $tutor->specialty_id }}</td>

                                            <td>
                                                <form action="{{ route('tutors.destroy', $tutor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tutors.show', $tutor->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tutors.edit', $tutor->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $tutors->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
