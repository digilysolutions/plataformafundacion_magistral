@extends('layouts.app-admin')
@section('title-header-admin')
    PLataforma Fundación Magistral
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
            <p>Tu contraseña es: {{ session()->get('password') }}
                <i>Debes cambiarla haciendo clic en el
                    <a href="/profile">perfil</a> de usuario en la esquina superior derecha</i>
            </p>
        </div>
    @endif

    <div class="dashboard-content">

        <h3>Notificaciones</h3>
        <div class="card mb-4">
            <div class="card-body">
                @if (count($notifications) === 0)
                    <p>No tienes nuevas notificaciones.</p>
                @else
                    <div class="row">
                        @foreach ($notifications as $notification)
                            <div class="col-12 col-md-4 mb-3"> <!-- 12 para móviles, 4 para escritorio -->
                                <div class="notification-item border p-3 bg-light rounded">
                                    <strong>Estudiante:</strong> {{ $notification['student_name'] }}<br>
                                    <strong>Resolvió:</strong> {{ $notification['exam_title'] }}<br>
                                    <strong>Especialidad:</strong> {{ $notification['specialty'] }}<br>
                                    <strong>Nivel:</strong> {{ $notification['level'] }}<br>
                                    <em>Tiempo: {{ $notification['time_taken'] }} minutos</em>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <h3>Resultados de Exámenes</h3>
        <div class="card mb-4">
            <div class="card-body">
                @if (count($examResults) === 0)
                    <p>No hay resultados de exámenes recientes.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Estudiante</th>
                                <th>Exámenes</th>
                                <th>Especialidad</th>
                                <th>Nivel</th>
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
                                    <td>{{ $result['specialty'] }}</td>
                                    <td>{{ $result['level'] }}</td>
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
