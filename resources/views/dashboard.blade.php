@extends('layouts.app-admin')
@section('title-header-admin')
   PLataforma Fundación Magistral
@endsection
@section('content-admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-transparent card-block card-stretch card-height border-none">
                <div class="card-body p-0 mt-lg-2 mt-0">
                    <h3 class="mb-3">¡Bienvenido al Dashboard de Administración!</h3>
                    <p class="mb-0 mr-4">Aquí podrás visualizar el rendimiento clave de nuestros procesos y tomar decisiones. ¡Explora y optimiza!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-info-light">
                                    <img src="{{ asset('img/47.jpg') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Centros Educativos Registrados</p>
                                    <h4>@if($studyCenter!=null){{count($studyCenter)}} @else 0 @endif</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-warning iq-progress progress-1" data-percent="85">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-danger-light">
                                    <img src="{{ asset('img/a4.png') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Estudiantes Registrados</p>
                                    <h4>{{count($students)}}</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-danger iq-progress progress-1" data-percent="70">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-success-light">
                                    <img src="{{ asset('img/3.png') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Items Resueltos</p>
                                    <h4>25</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-success iq-progress progress-1" data-percent="75">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-success-light">
                                    <img src="{{ asset('img/3.png') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Items No Resueltos</p>
                                    <h4>10</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-success iq-progress progress-1" data-percent="75">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-info">
                                    <img src="{{ asset('img/02.png') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Exámenes Resueltos</p>
                                    <h4>12</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-info iq-progress progress-1" data-percent="75">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-info">
                                    <img src="{{ asset('img/02.png') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Exámenes No Resueltos</p>
                                    <h4>3</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-info  iq-progress progress-1" data-percent="75">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-lg-8">
            <div class="card card-block card-stretch card-height">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Items Validados</h4>
                    </div>

                </div>
                <div class="card-body">
                    <ul class="list-unstyled row top-product mb-0">
                       @foreach ($specialties as $specialty)



                        <li class="col-lg-3">
                            <div class="card card-block card-stretch card-height mb-0">
                                <div class="card-body">
                                    <div class="bg-warning-light rounded">
                                        <img src="{{ asset('img/42.png') }}" class="style-img img-fluid m-auto p-3" alt="image">
                                    </div>
                                    <div class="style-text text-left mt-3">
                                        <h5 class="mb-1">{{$specialty->name}}</h5>
                                        <p class="mb-0">4 Items</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-transparent card-block card-stretch mb-4">
                <div class="card-header d-flex align-items-center justify-content-between p-0">
                    <div class="header-title">
                        <h4 class="card-title mb-0">Estudiantes Conectados</h4>
                    </div>
                    <div class="card-header-toolbar d-flex align-items-center">
                        <div><a href="#" class="btn btn-primary view-btn font-size-14">Ver todos</a></div>
                    </div>
                </div>
            </div>
            <div class="card card-block card-stretch card-height-hel ">
                <a href="#" class="iq-sub-card">
                    <div class="media align-items-center cust-card py-3 border-bottom">

                        <div class="media-body ml-3">
                            <div
                                class="d-flex align-items-center justify-content-between style-text">
                                <h6 class="mb-2">Yasniel Reyes</h6>
                                <small class="text-dark mr-5"><b>11 : 30 pm</b></small>
                            </div>
                            <small class="mb-0"> Tiempo: 25 min </small>
                        </div>

                    </div>

                </a>

            </div>
            <div class="card card-block card-stretch card-height-helf">
                <a href="#" class="iq-sub-card">
                    <div class="media align-items-center cust-card py-3 border-bottom">

                        <div class="media-body ml-3">
                            <div
                                class="d-flex align-items-center justify-content-between style-text">
                                <h6 class="mb-2">Jorge Barrameda</h6>
                                <small class="text-dark mr-5"><b>2:45 am</b></small>
                            </div>
                            <small class="mb-0"> Tiempo: 60 min </small>
                        </div>

                    </div>

                </a>
            </div>
        </div>


    </div>
    <!-- Page end  -->
</div>
@endsection
