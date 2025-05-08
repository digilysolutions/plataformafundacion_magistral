@extends('layouts.app-admin')
@section('title-header-admin')
    Panel Tutor - Plataforma Fundación Magistral
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

                                    <em>Tiempo: {{ $notification['time_taken'] }} minutos</em>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <h3>Nuevos estudiantes asignados</h3></h3>
        <div class="card mb-4">
            <div class="card-body">
                @if (count($students_assigned) === 0)
                    <p>No tienes estudiantes asignados.</p>
                @else
                    <div class="row">
                        @foreach ($students_assigned as $students)
                            <div class="col-12 col-md-4 mb-3"> <!-- 12 para móviles, 4 para escritorio -->
                                <div class="notification-item border p-3 rounded bg-primary">
                                    <strong>Estudiante:</strong> {{ $students['student_name'] }}<br>
                                    <strong>Estado:</strong> {{ $students['state_assign'] }}<br>
                                    <strong>Centro de estudio:</strong> {{ $students['study_center'] }}<br>

                                    <em>Fecha: {{ $students['date'] }}</em>
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
                                <th>No</th>
                                <th>Estudiante</th>
                                <th>Exámenes</th>
                                <th>Total Preguntas</th>
                                <th>Correctas</th>
                                <th>Incorrectas</th>
                                <th>Puntaje</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($examResults as $result)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $result['student_name'] }}</td>
                                    <td>{{ $result['exam_title'] }}</td>
                                    <td>{{ $result['total_questions'] }}</td>
                                    <td>{{ $result['correct_answers'] }}</td>
                                    <td>{{ $result['incorrect_answers'] }}</td>
                                    <td>{{ $result['score'] }}</td>
                                    <td><button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target=".bd-students_{{$i}}">ver</button></td>
                                </tr>
                                <div class="modal fade bd-students_{{$i}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title">Ver Examen: {{ $result['exam_title'] }}</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                            Estudiante: {{ $result['student_name'] }} <br>
                                            Total Preguntas:{{ $result['total_questions'] }}<br>
                                            Correctas:{{ $result['correct_answers'] }}<br>
                                            Incorrectas:{{ $result['incorrect_answers'] }}<br>
                                            Puntuación Final:{{ $result['score'] }}<br>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>


                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>



    </div>
@endsection
