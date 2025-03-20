@extends('layouts.app-admin')
@section('title-header-admin')
    Límite alcanzado
@endsection
@section('content-admin')
    <div class="container">
        <h2>Límite Alcanzado</h2>
        <p>Has alcanzado el límite de pruebas permitidas. Para más pruebas, considera actualizar tu membresía.</p>
        <a href="{{ route('membership.study_centers.renew_membership') }}" class="btn btn-primary">Actualizar Membresía</a>
    </div>
@endsection
