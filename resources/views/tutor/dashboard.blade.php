@extends('layouts.app-admin')
@section('title-header-admin')
    PLataforma Fundación Magistral
@endsection
@section('content-admin')
Tutor
@php
$user =Auth::user();
@endphp
    @if (session('first_login'))
    <div class="iq-alert-text">
        <p>Usuario: {{ $user->email }}</p>
        <p>Código de Seguimiento: {{ $user->person->id }}</p>
        <p>Tu contraseña es: {{ session()->get('password') }}
           <i>Debes cambiarla haciendo clic en el
           <a href="/profile">perfil</a> de usuario en la esquina superior derecha</i>
        </p>
    </div>
@endif

<div class="dashboard-content">
    <h2>Dashboard de Tutor</h2>

    <h3>Notificaciones</h3>
    <div class="card mb-4">
        <div class="card-body">
            @if (count($notifications) === 0)
                <p>No tienes nuevas notificaciones.</p>
            @else
                <ul>
                    @foreach ($notifications as $notification)
                        <li>
                            Estudiante: <strong>{{ $notification['student_name'] }}</strong><br>
                            Examen: <strong>{{ $notification['exam_title'] }}</strong><br>
                            Resultado:
                            <strong>{{ $notification['score'] }} puntos</strong><br>
                            Correctas: <strong>{{ $notification['correct_answers'] }}</strong>,
                            Incorrectas: <strong>{{ $notification['incorrect_answers'] }}</strong><br>
                            <em>Tiempo: {{ $notification['time_taken'] }} minutos</em>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <h3>Resultados de Pruebas</h3>
    <div class="card mb-4">
        <div class="card-body">
            @if (count($examResults) === 0)
                <p>No hay resultados de pruebas recientes.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Estudiante</th>
                            <th>Examen</th>
                            <th>Total Preguntas</th>
                            <th>Correctas</th>
                            <th>Incorrectas</th>
                            <th>Puntaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($examResults as $result)
                            <tr>
                                <td>{{ $result['student_name'] }}</td>
                                <td>{{ $result['exam_title'] }}</td>
                                <td>{{ $result['total_questions'] }}</td>
                                <td>{{ $result['correct_answers'] }}</td>
                                <td>{{ $result['incorrect_answers'] }}</td>
                                <td>{{ $result['score'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
