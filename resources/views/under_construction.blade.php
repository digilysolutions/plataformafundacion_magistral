@extends('layouts.app-admin')

@section('title-header-admin')
    Centros de Estudios
@endsection

@section('content-admin')


    <div class="mt-5 iq-maintenance">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-sm-12 text-center">
                    <div class="iq-maintenance">
                        <img src="{{asset('admin/images/error/02.png')}}" class="img-fluid" alt="">
                        <h3 class="mt-4 mb-1">En Construcción</h3>
                        <p>Esta sección está actualmente en desarrollo. ¡Pronto estará disponible!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
