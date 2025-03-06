@extends('layouts.app-admin')

@section('title-header-admin')
    Membresía
@endsection
@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive pricing pt-2">
                            <table id="my-table" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center prc-wrap"></th>
                                        @foreach ($memberships as $membership)
                                            <th class="text-center prc-wrap">
                                                <div class="prc-box active">
                                                    <div class="h3 pt-4">${{ $membership->price }}<small> /
                                                            {{ $membership->duration_days }} días </small>
                                                    </div> <span class="type">{{ $membership->name }}</span>
                                                </div>
                                            </th>
                                        @endforeach

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($features as $feature)

                                        <tr>
                                                <th class="text-center" scope="row">{{$feature->name}}</th>
                                                <td class="text-center child-cell"><i class="ri-check-line ri-2x">{{$membership->name}}</i>
                                                </td>
                                                <td class="text-center child-cell active"><i class="ri-close-line i_close">sddd
                                                </td>
                                                <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i>
                                                </td>
                                                <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i>
                                                </td>

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
