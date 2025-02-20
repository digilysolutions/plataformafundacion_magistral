@extends('layouts.app-admin')
@section('header-title')
   PLataforma Fundación Magistral
@endsection
@section('content-admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-transparent card-block card-stretch card-height border-none">
                <div class="card-body p-0 mt-lg-2 mt-0">
                    <h3 class="mb-3">¡Bienvenido al Dashboard de Administración!</h3>
                    <p class="mb-0 mr-4">Aquí podrás visualizar el rendimiento clave de nuestros procesos y tomar decisiones informadas para potenciar nuestro negocio. ¡Explora y optimiza!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-info-light">
                                    <img src="{{ asset('admin/images/page-img/47.jpg') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Centros Educativos</p>
                                    <h4>{{count($studyCenter)}}</h4>
                                </div>
                            </div>                                
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-info iq-progress progress-1" data-percent="85">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-danger-light">
                                    <img src="{{ asset('admin/images/page-img/a4.png') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Estudiantes</p>
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
                <div class="col-lg-3 col-md-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-success-light">
                                    <img src="{{ asset('admin/images/product/3.png') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Regionales</p>
                                    <h4>@if (count($regionals)>0){{count($regionals)}} @else 0 @endif</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-success iq-progress progress-1" data-percent="75">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-info">
                                    <img src="{{ asset('admin/images/page-img/02.png') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Distritos</p>
                                    <h4>{{count($districts)}}</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-success iq-progress progress-1" data-percent="75">
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
                        <h4 class="card-title">Especialidades</h4>
                    </div>
                    
                </div>
                <div class="card-body">
                    <ul class="list-unstyled row top-product mb-0">
                       @foreach ($specialties as $specialty)
                           
                      
                       
                        <li class="col-lg-3">
                            <div class="card card-block card-stretch card-height mb-0">
                                <div class="card-body">
                                    <div class="bg-warning-light rounded">
                                        <img src="{{ asset('admin/images/page-img/42.png') }}" class="style-img img-fluid m-auto p-3" alt="image">
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
                        <h4 class="card-title mb-0">Mejores Centros Educativos</h4>
                    </div>
                    
                </div>
            </div>
            <div class="card card-block card-stretch card-height-helf">
                <div class="card-body card-item-right">
                    <div class="d-flex align-items-top">
                        <div class="bg-warning-light rounded">
                            <img src="../assets/images/product/04.png" class="style-img img-fluid m-auto" alt="image">
                        </div>
                        <div class="style-text text-left">
                            <h5 class="mb-2">Coffee Beans Packet</h5>
                            <p class="mb-2">Total Sell : 45897</p>
                            <p class="mb-0">Total Earned : $45,89 M</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-block card-stretch card-height-helf">
                <div class="card-body card-item-right">
                    <div class="d-flex align-items-top">
                        <div class="bg-danger-light rounded">
                            <img src="../assets/images/product/05.png" class="style-img img-fluid m-auto" alt="image">
                        </div>
                        <div class="style-text text-left">
                            <h5 class="mb-2">Bottle Cup Set</h5>
                            <p class="mb-2">Total Sell : 44359</p>
                            <p class="mb-0">Total Earned : $45,50 M</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
      
        
    </div>
    <!-- Page end  -->
</div>
@endsection
