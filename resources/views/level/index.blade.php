@extends('layouts.app-admin')

@section('header-title')
    Levels
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Niveles') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('levels.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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


									<th >Nombre</th>
									<th >Descripción</th>
									<th >Especialidad</th>
                                    <th >Activado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($levels as $level)
                                        <tr>
                                            <td>{{ ++$i }}</td>


										<td >{{ $level->name }}</td>
										<td >{{ $level->description }}</td>
										<td >{{ $level->specialty->name }}</td>
                                        <td >{{ $level->activated }}</td>
                                            <td>
                                                <form action="{{ route('levels.destroy', $level->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('levels.show', $level->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('levels.edit', $level->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $levels->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
