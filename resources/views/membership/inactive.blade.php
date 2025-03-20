@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Membresíainactiva') }} @endsection

@section('content-admin')
    <div class="container">
        <h2>Membresía Inactiva</h2>
        <p>Tu membresía está inactiva. Por favor, renueva tu membresía para acceder a los contenidos.</p>
        <a href="{{ route('membership.renew') }}" class="btn btn-primary">Renovar Membresía</a>
    </div>
@endsection
