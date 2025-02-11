@extends('layouts.app-admin')

@section('header-title')
    Regionals
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Regionals') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('regionals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Name</th>
									<th >Address</th>
									<th >Phone</th>
									<th >Mail</th>
									<th >Tracking Code</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($regionals as $regional)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $regional->name }}</td>
										<td >{{ $regional->address }}</td>
										<td >{{ $regional->phone }}</td>
										<td >{{ $regional->mail }}</td>
										<td >{{ $regional->tracking_code }}</td>

                                            <td>
                                                <form action="{{ route('regionals.destroy', $regional->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('regionals.show', $regional->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('regionals.edit', $regional->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $regionals->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
