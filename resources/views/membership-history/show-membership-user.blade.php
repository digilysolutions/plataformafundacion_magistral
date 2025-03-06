@extends('layouts.app-admin')

@section('title-header-admin')
    Membership Histories
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Membership Histories') }}
                            </span>


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

									<th >Centro de Estudio</th>
									<th >Membresía</th>
									<th >Fecha</th>
									<th >Estado</th>
									<th >Mensaje</th>


                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($membershipHistories as $membershipHistory)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $membershipHistory->user->person?->studyCenter?->name }}</td>
										<td >{{ $membershipHistory->membership->name }}</td>
										<td >{{ $membershipHistory->start_date }}</td>
										<td >{{ $membershipHistory->membershipStatus->name }}</td>
										<td >{{ $membershipHistory->membershipStatus->description }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>
                                  <tfoot>
                                 <tr>
                                 <th>No</th>

                                 <th >Centro de Estudio</th>
                                 <th >Membresía</th>
                                 <th >Fecha</th>
                                 <th >Estado</th>
                                 <th >Mensaje</th>

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
