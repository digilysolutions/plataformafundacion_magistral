@extends('layouts.app-admin')

@section('title-header-admin')
    Exámenes Resueltos - Pruebas Nacionales por Asignatura
@endsection
@section('css')
@endsection

@section('content-admin')
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    Exámenes Resueltos - Pruebas Nacionales por Asignatura </span>

            </div>
        </div>
        <div class="card-body bg-white">

            <div class="table-responsive">

                <table id="datatable" class="table data-tables table-striped">
                    <thead>
                        <tr class="ligth">

                            <th>Estudiantes </th>
                            <th>Examen Nacional </th>
                            <th>Asignatura </th>
                            <th>Fecha Completado </th>
                            <th>Tiempo Utilizado </th>
                            <th> Calificación (/100) </th>
                            <th>Estado </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class=""> <!-- Aprobado -->
                            <td>Luisa Cabrera Méndez</td>
                            <td>Nacional 2023</td>
                            <td>Español</td> <!-- Dato Cambiado -->
                            <td>2023-06-10</td>
                            <td class="time-taken">1 h 45 min</td>
                            <td class="score">85</td>
                            <td class="status"><span class="mt-2 badge badge-pill badge-primary">Aprobado</span></td>
                        </tr>
                        <tr class="table-secondary"> <!-- Reprobado -->
                            <td>Marcos Peña Sosa</td>
                            <td>Nacional 2023</td>
                            <td>Matemáticas</td> <!-- Dato Cambiado -->
                            <td>2023-06-11</td>
                            <td class="time-taken">1 h 58 min</td>
                            <td class="score">42</td>
                            <td class="status"><span class="mt-2 badge badge-pill badge-secondary">Reprobado</span></td>
                        </tr>
                        <tr class=""> <!-- Aprobado -->
                            <td>Valeria Núñez Rojas</td>
                            <td>Nacional 2023</td>
                            <td>Ciencias Sociales</td> <!-- Dato Cambiado -->
                            <td>2023-06-12</td>
                            <td class="time-taken">1 h 30 min</td>
                            <td class="score">78</td>
                            <td class="status"><span class="mt-2 badge badge-pill badge-primary">Aprobado</span></td>
                        </tr>
                        <tr class=""> <!-- Aprobado -->
                            <td>Ricardo Alvarez Cruz</td>
                            <td>Nacional 2023</td>
                            <td>Ciencias Naturales</td> <!-- Dato Cambiado -->
                            <td>2023-06-13</td>
                            <td class="time-taken">1 h 50 min</td>
                            <td class="score">91</td>
                            <td class="status"><span class="mt-2 badge badge-pill badge-primary">Aprobado</span></td>
                        </tr>
                         <tr class="table-secondary"> <!-- Reprobado -->
                            <td>Camila Herrera Castro</td>
                            <td>Nacional 2024</td>
                            <td>Español</td> <!-- Dato Cambiado -->
                            <td>2024-06-10</td>
                            <td class="time-taken">1 h 55 min</td>
                            <td class="score">55</td>
                            <td class="status"><span class="mt-2 badge badge-pill badge-secondary">Reprobado</span></td>
                        </tr>
                        <tr class=""> <!-- Aprobado -->
                            <td>Andrés Medina León</td>
                            <td>Nacional 2024</td>
                            <td>Matemáticas</td> <!-- Dato Cambiado -->
                            <td>2024-06-11</td>
                            <td class="time-taken">1 h 40 min</td>
                            <td class="score">68</td>
                            <td class="status"><span class="mt-2 badge badge-pill badge-primary">Aprobado</span></td>
                        </tr>
                        <tr class="table-secondary"> <!-- Reprobado -->
                            <td>Isabella Vargas Blanco</td>
                            <td>Nacional 2024</td>
                            <td>Ciencias Sociales</td> <!-- Dato Cambiado -->
                            <td>2024-06-12</td>
                            <td class="time-taken">1 h 48 min</td>
                            <td class="score">30</td>
                            <td class="status"><span class="mt-2 badge badge-pill badge-secondary">Reprobado</span></td>
                        </tr>
                         <tr class=""> <!-- Aprobado -->
                            <td>Mateo Santana Romero</td>
                            <td>Nacional 2024</td>
                            <td>Ciencias Naturales</td> <!-- Dato Cambiado -->
                            <td>2024-06-13</td>
                            <td class="time-taken">1 h 35 min</td>
                            <td class="score">72</td>
                            <td class="status"><span class="mt-2 badge badge-pill badge-primary">Aprobado</span></td>
                        </tr>
                         <tr class=" "> <!-- Aprobado -->
                            <td>Daniela Reyes Flores</td>
                            <td>Nacional 2023</td>
                            <td>Matemáticas</td> <!-- Dato Cambiado -->
                            <td>2023-06-11</td>
                            <td class="time-taken">1 h 25 min</td>
                            <td class="score">95</td>
                            <td class="status"><span class="mt-2 badge badge-pill badge-primary">Aprobado</span></td>
                        </tr>
                         <tr class=""> <!-- Aprobado -->
                            <td>Diego Silva Muñoz</td>
                            <td>Nacional 2024</td>
                            <td>Español</td> <!-- Dato Cambiado -->
                            <td>2024-06-10</td>
                            <td class="time-taken">1 h 59 min</td>
                            <td class="score">61</td>
                            <td class="status"><span class="mt-2 badge badge-pill badge-primary">Aprobado</span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Estudiantes </th>
                            <th>Examen Nacional </th>
                            <th>Asignatura </th>
                            <th>Fecha Completado </th>
                            <th>Tiempo Utilizado </th>
                            <th> Calificación (/100) </th>
                            <th>Estado </th>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endsection
