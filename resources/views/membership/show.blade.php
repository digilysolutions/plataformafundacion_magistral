@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $membership->name ?? __('Mostrar') . ' ' . __('Membresía') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card card-block card-stretch card-height blog pricing-details">
                    <div class="card-body text-center rounded">
                        <div class="pricing-header bg-primary text-white">
                            <div class="icon-data mb-3"><i class="ri-star-line"></i>
                            </div>
                            <h2 class="mb-4 display-5 font-weight-bolder text-white"> ${{ $membership->price }}<small
                                    class="font-size-14">/ {{ $membership->duration_days }} @if ($membership->duration_days > 1)
                                        días
                                    @else
                                        día
                                    @endif
                                </small></h2>
                        </div>
                        <h3 class="mb-3"> {{ $membership->name }}</h3>
                        <ul class="list-unstyled mb-0">
                            <li><strong>Fecha Inicio:</strong> {{ $membership->start_date }}</li>
                            <li><strong>Fecha Final: </strong>
                                @if ($membership->end_date != null)
                                    {{ $membership->end_date }}
                                @else
                                    Ilimitado
                                @endif
                            </li>

                            <li>Tipo: {{ $membership->type }}</li>
                        </ul>
                        <strong class="  mt-3 text-center text-primary" style="max-width: 100%; word-wrap: break-word;">
                            {{ $messageActivate }}
                        </strong>

                    </div>

                </div>

            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Membresía</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm"
                                href="{{ URL::previous() ?? (request()->headers->get('referer') ?? route('memberships.index')) }}">
                                {{ __('Atrás') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="table-responsive pricing pt-2">
                            <table id="my-table" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center prc-wrap"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($features as $feature)
                                        <tr>
                                            <th class="" scope="row">{{ $feature->name }}</th>

                                            @foreach ($membershipMemberShipFeature as $mmFeature)
                                                @if ($mmFeature->membership_feature_id == $feature->id)
                                                    <td >
                                                        {{$mmFeature->description}}
                                                    </td>
                                                    @break
                                                @endif
                                            @endforeach


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
