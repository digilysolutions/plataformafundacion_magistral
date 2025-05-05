@extends('layouts.app-admin')

@section('title-header-admin')
Exámenes - Pruebas PISA por Niveles y Tiempo
@endsection
@section('css')
@endsection

@section('content-admin')
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    Exámeness - Pruebas PISA por Niveles y Tiempo
                </span>


            </div>
        </div>
        <div class="card-body bg-white">

            <div class="table-responsive">

                <table id="datatable" class="table data-tables table-striped">
                    <thead>
                        <tr class="ligth">

                            <th>Estudiantes </th>
                            <th>Examen PISA </th>
                            <th>Fecha Completado </th>
                            <th>Tiempo Utilizado </th>
                            <th>Nivel PISA Alcanzado </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ana Martínez Pérez</td>
                            <td>PISA 2022 - Lectura</td>
                            <td>2023-10-25</td>
                            <td class="time-taken">2 h 15 min</td> <!-- Nuevo Dato -->
                            <td class="pisa-level">4</td>
                        </tr>
                        <tr>
                            <td>Carlos Gómez Rodríguez</td>
                            <td>PISA 2022 - Matemáticas</td>
                            <td>2023-10-26</td>
                            <td class="time-taken">2 h 28 min</td> <!-- Nuevo Dato -->
                            <td class="pisa-level">3</td>
                        </tr>
                        <tr>
                            <td>Laura Fernández Díaz</td>
                            <td>PISA 2022 - Ciencias</td>
                            <td>2023-10-27</td>
                            <td class="time-taken">2 h 05 min</td> <!-- Nuevo Dato -->
                            <td class="pisa-level">5</td>
                        </tr>
                        <tr>
                            <td>David Sánchez López</td>
                            <td>PISA 2023 - Lectura</td>
                            <td>2024-03-15</td>
                            <td class="time-taken">1 h 55 min</td> <!-- Nuevo Dato -->
                            <td class="pisa-level">4</td>
                        </tr>
                        <tr>
                            <td>Sofía Ramírez García</td>
                            <td>PISA 2023 - Matemáticas</td>
                            <td>2024-03-16</td>
                             <td class="time-taken">2 h 10 min</td> <!-- Nuevo Dato -->
                            <td class="pisa-level">5</td>
                        </tr>
                        <tr>
                            <td>Javier Torres Ruiz</td>
                            <td>PISA 2023 - Ciencias</td>
                            <td>2024-03-17</td>
                            <td class="time-taken">2 h 25 min</td> <!-- Nuevo Dato -->
                            <td class="pisa-level">3</td>
                        </tr>
                        <tr>
                            <td>Elena Jiménez Vázquez</td>
                            <td>PISA 2022 - Lectura</td>
                            <td>2023-11-01</td>
                            <td class="time-taken">2 h 20 min</td> <!-- Nuevo Dato -->
                            <td class="pisa-level">2</td>
                        </tr>
                        <tr>
                            <td>Miguel Moreno Castillo</td>
                            <td>PISA 2022 - Matemáticas</td>
                            <td>2023-11-02</td>
                            <td class="time-taken">1 h 48 min</td> <!-- Nuevo Dato -->
                            <td class="pisa-level">4</td>
                        </tr>
                        <tr>
                            <td>Paula Navarro Gil</td>
                            <td>PISA 2023 - Ciencias</td>
                            <td>2024-04-01</td>
                            <td class="time-taken">2 h 00 min</td> <!-- Nuevo Dato -->
                            <td class="pisa-level">6</td>
                        </tr>
                        <tr>
                            <td>Adrián Domínguez Santos</td>
                            <td>PISA 2023 - Matemáticas</td>
                            <td>2024-04-02</td>
                            <td class="time-taken">2 h 29 min</td> <!-- Nuevo Dato -->
                            <td class="pisa-level">3</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Estudiantes </th>
                            <th>Examen PISA </th>
                            <th>Fecha Completado </th>
                            <th>Tiempo Utilizado </th>
                            <th>Nivel PISA Alcanzado </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endsection
