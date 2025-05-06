@extends('layouts.app-admin')
@section('title-header-admin')
    Panel Tutor - Plataforma Fundación Magistral
@endsection
@section('content-admin')
@php
$students_assigned = [
    [
        'student_name' => 'Juan Pérez',
        'state_assign' => 'Asignado',
        'study_center' => 'Divina Pastora',
        'date' => "2/05/2025",
    ],
    [
        'student_name' => 'María Suárez',
        'state_assign' => 'Asignado',
        'study_center' => 'COMENDADOR',
        'date' => "1/05/2025",
    ],
    [
        'student_name' => 'Carlos Ortiz',
        'state_assign' => 'Asignado',
        'study_center' => 'Divina Pastora',
        'date' => "2/05/2025",
    ],
    [
        'student_name' => 'Anay Torres',
        'state_assign' => 'Asignado',
        'study_center' => 'COMENDADOR',
        'date' => "5/05/2025",
    ],
    [
        'student_name' => 'Carlos Luis Martínez',
        'state_assign' => 'Asignado',
        'study_center' => 'Divina Pastora',
        'date' => "6/05/2025",
    ],
    [
        'student_name' => 'Luis Ernesto Martínez',
        'state_assign' => 'Asignado',
        'study_center' => 'COMENDADOR',
        'date' => "6/05/2025",
    ],
];
@endphp

    <div class="dashboard-content">

        <div class="card mb-4">
            <div class="card-header">
                Estudiantes Asignados
            </div>
            <div class="card-body"> {{-- Define tus datos ficticios aquí si no vienen de un controlador --}}


                {{-- Comprobar si hay datos para mostrar --}}
                @if (count($students_assigned) === 0)
                    <p>No hay estudiantes asignados.</p>
                @else
                    <div class="table-responsive"> {{-- Para mejor manejo en pantallas pequeñas --}}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Estudiante</th>
                                    <th>Estado de Asignación</th>
                                    <th>Centro de Estudio</th>
                                    <th>Fecha de Asignación</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Iterar sobre los datos de estudiantes asignados --}}
                                @foreach ($students_assigned as $student)
                                    <tr>
                                        <td>{{ $student['student_name'] }}</td>
                                        <td>{{ $student['state_assign'] }}</td>
                                        <td>{{ $student['study_center'] }}</td>
                                        <td>{{ $student['date'] }}</td> {{-- La fecha ya está en formato string --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
