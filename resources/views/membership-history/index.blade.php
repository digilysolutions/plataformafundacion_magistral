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
                                {{ __('Histórico de Membresía') }}
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

									<th >User Id</th>
									<th >Membership Id</th>
									<th >Start Date</th>
									<th >End Date</th>
									<th >Status</th>
									<th >Message</th>


                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($membershipHistories as $membershipHistory)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $membershipHistory->user_id }}</td>
										<td >{{ $membershipHistory->membership_id }}</td>
										<td >{{ $membershipHistory->start_date }}</td>
										<td >{{ $membershipHistory->end_date }}</td>
										<td >{{ $membershipHistory->status }}</td>
										<td >{{ $membershipHistory->message }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>
                                  <tfoot>
                                 <tr>
                                 <th>No</th>

									<th >User Id</th>
									<th >Membership Id</th>
									<th >Start Date</th>
									<th >End Date</th>
									<th >Status</th>
									<th >Message</th>

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
