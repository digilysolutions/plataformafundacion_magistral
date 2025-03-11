@extends('layouts.app-admin')

@section('title-header-admin')
 Registro Exitoso
@endsection
@section('content-admin')
<div class="container">
    <h1>¡Registro Exitoso!</h1>
    <p>Gracias por registrarte. Se ha enviado un correo electrónico a tu dirección. Por favor, revisa tu correo y sigue las instrucciones para verificar tu cuenta.</p>
    <a href="{{ url('/') }}">Regresar a la página de inicio</a>
</div>

@endsection

