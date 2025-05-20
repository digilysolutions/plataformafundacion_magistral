@extends('layouts.app-admin')
@section('title-header-admin')
    Panel Validador - Plataforma Fundación Magistral
@endsection
@section('content-admin')

    @php
        $user = Auth::user();
    @endphp
    <h3> {{ $user->person->name }}</h3>
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
        <h2>Notificaciones</h2>
        @if (isset($notifications) && count($notifications) > 0)
            <ul class="notifications-list">
                @foreach ($notifications as $notification)
                    <li>
                        {{ $notification->user_name }} {{ $notification->action }}
                    </li>
                @endforeach
            </ul>
        @else
            <div class="dashboard-content">


                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 mb-3"> <!-- 12 para móviles, 4 para escritorio -->
                                <div class="notification-item border p-3 rounded" style="background-color: #f0f8ff;">
                                    <strong>ITEM Diagnóstico</strong><br>
                                    <strong>Código:</strong>MA-CMR-NUM-3RO-011<br>
                                    <strong>Items:</strong> ¿Cuál es la forma correcta de escribir ....?<br>
                                    <strong>Especialidad:</strong>Matematica<br>
                                    <strong>Competencia:</strong>CMR-NUM<br>
                                    <strong>Estado:</strong><span class="badge bg-warning-light">Por Validar</span><br>
                                    <em>Fecha: 08/05/2025</em>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-3"> <!-- 12 para móviles, 4 para escritorio -->
                                <div class="notification-item border p-3 rounded" style="background-color: #f0f8ff;">
                                    <strong>ITEM Diagnóstico</strong><br>
                                    <strong>Código:</strong>MA-CMR-NUM-3RO-002<br>
                                    <strong>Items:</strong> ¿Qué número completa correctamente...?<br>
                                    <strong>Especialidad:</strong>Matematica<br>
                                    <strong>Competencia:</strong>CMR-NUM<br>
                                    <strong>Estado:</strong><span class="badge bg-primary">Validado</span><br>
                                    <em>Fecha: 07/05/2025</em>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-3"> <!-- 12 para móviles, 4 para escritorio -->
                                <div class="notification-item border p-3 rounded" style="background-color: #f0f8ff;">
                                    <strong>ITEM PISA</strong><br>
                                    <strong>Código:</strong>MA-RAZ-N3-105<br>
                                    <strong>Items:</strong> Una compañía de telefonía móvil ofrece...<br>
                                    <strong>Especialidad:</strong>Matematica<br>
                                    <strong>Nivel:</strong>3<br>
                                    <strong>Estado:</strong><span class="badge bg-primary">Validado</span><br>
                                    <em>Fecha: 07/05/2025</em>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        @endif
    </div>

@endsection
