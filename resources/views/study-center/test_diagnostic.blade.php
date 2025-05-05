@extends('layouts.app-admin')

@section('title-header-admin')
    Resultados - Exámenes Diagnósticos
@endsection
@section('css')
@endsection

@section('content-admin')
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    Resultados - Exámenes Diagnósticos
                </span>

            </div>
        </div>
        <div class="card-body bg-white">

            <div class="table-responsive">

                <table id="datatable" class="table data-tables table-striped">
                    <thead>
                        <tr class="ligth">

                            <th>Estudiantes </th>
                            <th>Examen Diagnóstico </th>
                            <th>Componente Evaluado </th>
                            <th>Fecha Completado </th>
                            <th>Tiempo Utilizado </th>
                            <th> Puntuación (Escala 300±50) </th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Alejandro Rojas Vidal</td>
                            <td>Diagnóstico Inicial 2024</td>
                            <td>Comprensión Lectora</td>
                            <td>2024-01-15</td>
                            <td class="time-taken">55 min</td>
                            <td class="score">310</td>
                        </tr>
                        <tr>
                            <td>Beatriz Gil Fernández</td>
                            <td>Diagnóstico Inicial 2024</td>
                            <td>Razonamiento Matemático</td>
                            <td>2024-01-15</td>
                            <td class="time-taken">1 h 10 min</td>
                            <td class="score">285</td>
                        </tr>
                         <tr>
                            <td>Carlos Fuentes Soler</td>
                            <td>Diagnóstico Mitad de Año 2024</td>
                            <td>Ciencias Naturales</td>
                            <td>2024-05-20</td>
                            <td class="time-taken">1 h 00 min</td>
                            <td class="score">340</td>
                        </tr>
                        <tr>
                            <td>Diana Mora Ortiz</td>
                            <td>Diagnóstico Mitad de Año 2024</td>
                            <td>Ciencias Sociales</td>
                            <td>2024-05-20</td>
                            <td class="time-taken">48 min</td>
                            <td class="score">260</td>
                        </tr>
                        <tr>
                            <td>Esteban Solís Vega</td>
                            <td>Diagnóstico Inicial 2024</td>
                            <td>Resolución de Problemas</td>
                            <td>2024-01-16</td>
                            <td class="time-taken">1 h 15 min</td>
                            <td class="score">305</td>
                        </tr>
                         <tr>
                            <td>Fernanda Ponce Bravo</td>
                            <td>Diagnóstico Inicial 2024</td>
                            <td>Comprensión Lectora</td>
                            <td>2024-01-16</td>
                            <td class="time-taken">50 min</td>
                            <td class="score">290</td>
                        </tr>
                         <tr>
                            <td>Gabriel Castro Salas</td>
                            <td>Diagnóstico Mitad de Año 2024</td>
                            <td>Razonamiento Matemático</td>
                            <td>2024-05-21</td>
                            <td class="time-taken">1 h 05 min</td>
                            <td class="score">365</td> <!-- Score más alto -->
                        </tr>
                        <tr>
                            <td>Helena Ibáñez Parra</td>
                            <td>Diagnóstico Mitad de Año 2024</td>
                            <td>Ciencias Naturales</td>
                            <td>2024-05-21</td>
                            <td class="time-taken">1 h 12 min</td>
                            <td class="score">240</td> <!-- Score más bajo -->
                        </tr>
                         <tr>
                            <td>Ignacio Duran Soto</td>
                            <td>Diagnóstico Inicial 2024</td>
                            <td>Ciencias Sociales</td>
                            <td>2024-01-17</td>
                            <td class="time-taken">58 min</td>
                            <td class="score">325</td>
                        </tr>
                         <tr>
                            <td>Jimena Cárdenas Rivas</td>
                            <td>Diagnóstico Inicial 2024</td>
                            <td>Razonamiento Matemático</td>
                            <td>2024-01-17</td>
                            <td class="time-taken">1 h 20 min</td>
                            <td class="score">275</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Estudiantes </th>
                            <th>Examen Diagnóstico </th>
                            <th>Componente Evaluado </th>
                            <th>Fecha Completado </th>
                            <th>Tiempo Utilizado </th>
                            <th> Puntuación (Escala 300±50) </th>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endsection
