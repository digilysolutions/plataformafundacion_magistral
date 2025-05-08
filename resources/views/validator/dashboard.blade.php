@extends('layouts.app-admin')
@section('title-header-admin')
Panel Validador - Plataforma Fundación Magistral
@endsection
@section('content-admin')

    @php
        $user = Auth::user();
    @endphp
   <h3>  {{$user->person->name}}</h3>
    @if (session('first_login'))
        <div class="iq-alert-text">
            <p>Usuario: {{ $user->email }}</p>
            <p>Código de Seguimiento: {{ $user->person->id }}</p>
            <p> <i>Debes cambiarla haciendo clic en el
                    <a href="/profile">perfil</a> de usuario en la esquina superior derecha</i>
            </p>
        </div>
    @endif
    <div class="dashboard-content">
        <h2>Área de Notificaciones</h2>
        @if (isset($notifications) && count($notifications) > 0)
            <ul class="notifications-list">
                @foreach ($notifications as $notification)
                    <li>
                        {{ $notification->user_name }} {{ $notification->action }}
                    </li>
                @endforeach
            </ul>
        @else
        <h4>Nuevos items por validar</h4>
        <div class="card mb-12">
            <div class="card-body">


                    <div class="row">
                            <div class="col-12 col-md-12 mb-12"> <!-- 12 para móviles, 4 para escritorio -->
                                <div class="notification-item border p-3 rounded">
                                    <strong>Código:</strong>MA-CMR-NUM-3RO-011<br>
                                    <strong>Items:</strong> ¿Cuál es la forma correcta de escribir el número "cuatrocientos setenta y dos" usando cifras?<br>
                                    <strong>Especialidad:</strong>Matematica<br>
                                    <strong>Competencia:</strong>CMR-NUM<br>

                                    <em>Fecha: 08/05/2025</em>
                                </div>
                            </div>
                    </div>

            </div>
        </div>

        @endif
    </div>

@endsection
