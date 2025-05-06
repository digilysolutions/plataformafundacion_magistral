@extends('layouts.app-admin')

@section('title-header-admin')
    usuario General- Items PISA
@endsection

@section('content-admin')
<h1>Resultados Generales ITEMS PISA por Estudiante </h1>

{{-- Generar datos ficticios para la tabla --}}
@php
    $pisaResults = [
        [
            'student_name' => 'Adrián Domínguez Santos',
            'exam_name' => 'PISA 2023 - Matemáticas',
            'completion_date' => '2024-04-02',
            'time_taken' => '2 h 29 min',
            'pisa_level' => 3,
        ],
        [
            'student_name' => 'Ana Martínez Pérez',
            'exam_name' => 'PISA 2022 - Lectura',
            'completion_date' => '2023-10-25',
            'time_taken' => '2 h 15 min',
            'pisa_level' => 4,
        ],
        [
            'student_name' => 'Carlos Gómez Rodríguez',
            'exam_name' => 'PISA 2022 - Matemáticas',
            'completion_date' => '2023-10-26',
            'time_taken' => '2 h 28 min',
            'pisa_level' => 3,
        ],
        [
            'student_name' => 'David Sánchez López',
            'exam_name' => 'PISA 2023 - Lectura',
            'completion_date' => '2024-03-15',
            'time_taken' => '1 h 55 min',
            'pisa_level' => 4,
        ],
        [
            'student_name' => 'Elena Jiménez Vázquez',
            'exam_name' => 'PISA 2022 - Lectura',
            'completion_date' => '2023-11-01',
            'time_taken' => '2 h 20 min',
            'pisa_level' => 2,
        ],
        [
            'student_name' => 'Javier Torres Ruiz',
            'exam_name' => 'PISA 2023 - Ciencias',
            'completion_date' => '2024-03-17',
            'time_taken' => '2 h 25 min',
            'pisa_level' => 3,
        ],
        [
            'student_name' => 'Laura Fernández Díaz',
            'exam_name' => 'PISA 2022 - Ciencias',
            'completion_date' => '2023-10-27',
            'time_taken' => '2 h 05 min',
            'pisa_level' => 5,
        ],
        [
            'student_name' => 'Miguel Moreno Castillo',
            'exam_name' => 'PISA 2022 - Matemáticas',
            'completion_date' => '2023-11-02',
            'time_taken' => '1 h 48 min',
            'pisa_level' => 4,
        ],
        [
            'student_name' => 'Paula Navarro Gil',
            'exam_name' => 'PISA 2023 - Ciencias',
            'completion_date' => '2024-04-01',
            'time_taken' => '2 h 00 min',
            'pisa_level' => 6,
        ],
        [
            'student_name' => 'Sofía Ramírez García',
            'exam_name' => 'PISA 2023 - Matemáticas',
            'completion_date' => '2024-03-16',
            'time_taken' => '2 h 10 min',
            'pisa_level' => 5,
        ],
    ];

    // Simular paginación si es necesario para maquetación (opcional)
    // $currentPage = 1;
    // $perPage = 15;
    // $totalItems = count($pisaResults);
    // $totalPages = ceil($totalItems / $perPage);
    // $paginatedResults = $pisaResults; // En maquetación, mostramos todos
@endphp

<div class="card mb-4">
    <div class="card-header">
        Resultados de Pruebas PISA
    </div>
    <div class="card-body">
        @if (empty($pisaResults)) {{-- Usamos empty() para verificar si el arreglo está vacío --}}
            <p>No hay resultados de pruebas PISA disponibles.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Estudiante</th>
                            <th>Items PISA</th>
                            <th>Fecha Completado</th>
                            <th>Tiempo Utilizado</th>
                            <th>Nivel Alcanzado</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Iterar sobre los resultados de PISA --}}
                        @foreach ($pisaResults as $result)
                            <tr>
                                <td>{{ $result['student_name'] }}</td>
                                <td>{{ $result['exam_name'] }}</td>
                                <td>
                                    {{-- Formatear la fecha si es necesario, o mostrar directamente si ya es string --}}
                                    {{ \Carbon\Carbon::parse($result['completion_date'])->format('d/m/Y') }}
                                </td>
                                <td>{{ $result['time_taken'] }}</td>
                                <td>{{ $result['pisa_level'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Simulación de paginación si es necesario (opcional, solo maquetación) --}}
            {{--
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">Siguiente</a></li>
                    </ul>
                </nav>
            </div>
            --}}

        @endif
    </div>
</div>

@endsection
