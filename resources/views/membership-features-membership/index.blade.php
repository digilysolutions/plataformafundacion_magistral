@extends('layouts.app-admin')

@section('header-title')
    Membership Features Memberships
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Membership Features Memberships') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('membership-features-memberships.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Membership Id</th>
									<th >Membership Feature Id</th>
									<th >Value</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($membershipFeaturesMemberships as $membershipFeaturesMembership)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $membershipFeaturesMembership->membership_id }}</td>
										<td >{{ $membershipFeaturesMembership->membership_feature_id }}</td>
										<td >{{ $membershipFeaturesMembership->value }}</td>

                                            <td>
                                                <form action="{{ route('membership-features-memberships.destroy', $membershipFeaturesMembership->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('membership-features-memberships.show', $membershipFeaturesMembership->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('membership-features-memberships.edit', $membershipFeaturesMembership->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                                  
									<th >Membership Id</th>
									<th >Membership Feature Id</th>
									<th >Value</th>

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
