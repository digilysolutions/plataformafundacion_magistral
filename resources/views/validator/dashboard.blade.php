@extends('layouts.app-admin')
@section('title-header-admin')
    PLataforma Fundación Magistral
@endsection
@section('content-admin')
    Validador
    @php
        $user = Auth::user();
    @endphp
    @if (session('first_login'))
        <div class="iq-alert-text">
            <p>Usuario: {{ $user->email }}</p>
            <p>Código de Seguimiento: {{ $user->person->id }}</p>
            <p>             <i>Debes cambiarla haciendo clic en el
                    <a href="/profile">perfil</a> de usuario en la esquina superior derecha</i>
            </p>
        </div>
    @endif
    <div class="dashboard-content">
        <h2>Área de Notificaciones</h2>

        @if (session('notification'))
            <div class="alert alert-info">
                {{ session('notification') }}
                <a href="/report/download" class="btn btn-primary">Descargar Informe</a>
            </div>
        @endif

        @if (isset($notifications) && count($notifications) > 0)
            <ul class="notifications-list">
                @foreach ($notifications as $notification)
                    <li>
                        {{ $notification->user_name }} {{ $notification->action }}
                        <a href="/report/download" class="btn btn-primary">Descargar Informe</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay nuevas notificaciones.</p>
        @endif
    </div>

@endsection
