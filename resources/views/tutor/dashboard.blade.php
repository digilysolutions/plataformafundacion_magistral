@extends('layouts.app-admin')
@section('title-header-admin')
    PLataforma Fundación Magistral
@endsection
@section('content-admin')
Tutor
{{ dd(session()->all()) }}  {{-- Para depurar el arreglo de la sesión --}}
    @if (Session::has('password'))
        <div class="iq-alert-text">
            <p>Usuario: {{ $user->email }}</p>
            <p>Código de Seguimimiento: {{ $user?->person?->id }}</p>
            <p>Tu contraseña es: {{ session()->get('password') }} <i>Debes cambiarla haciendo click en el <a
                        href="/profile">perfil</a> de usuario en la esquina superior derecha</i></p>

        </div>
    @endif
@endsection
