@extends('layouts.app-admin')

@section('title-header-admin')
Reportes
@endsection
@section('content-admin')
<h1>Sección de Reportes</h1>

{{-- Contenido principal de la página de reportes (opcional) --}}
<p>Aquí puedes tener un resumen de reportes, filtros, etc.</p>

<div class="row">
    <div class="col-lg-6">
        <div class="card card-block card-stretch card-height">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Pruebas Nacionales</h4>
                </div>
                <div class="card-header-toolbar d-flex align-items-center">
                    <div class="dropdown">
                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton1"
                            data-toggle="dropdown">
                            Este Mes<i class="ri-arrow-down-s-line ml-1"></i>
                        </span>
                        <div class="dropdown-menu dropdown-menu-right shadow-none"
                            aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" href="#">Año</a>
                            <a class="dropdown-item" href="#">Mes</a>
                            <a class="dropdown-item" href="#">Semana</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="report-chart1"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-block card-stretch card-height">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Pruebas por Niveles</h4>
                </div>
                <div class="card-header-toolbar d-flex align-items-center">
                    <div><a href="#" class="btn light-gray view-btn">500</a></div>
                </div>
            </div>
            <div class="card-body">
                <div id="report-chart3"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade reports-examen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reportes Exámenes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El Centro Educativo puede generar un reporte de la actividad de la resolución de exámenes en
                    plataforma. Este reporte tiene:</p>
                <ul>
                    <li>Cantidad de exámenes resueltos y no resueltos.</li>
                    <li>Intentos realizados en la solución de los mismos y detalles de los estudiantes que participaron.
                        Este reporte se puede hacer para Pruebas PISA, Pruebas Nacionales y Exámenes Diagnóstico.</li>
                    <li>Tiempo promedio para resolución de exámenes.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade reports-tutors" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reportes Tutores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El Centro Educativo puede generar un reporte de la actividad de los tutores en plataforma. Este
                    reporte tiene:</p>
                <ul>
                    <li>Cantidad de notificaciones recibidas.</li>
                    <li>Números de acceso a la plataforma.</li>
                    <li>Tiempo que han permanecido en la misma.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>



<div class="modal fade reports-centro" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reporte Centro </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El centro educativo puede generar un reporte de la actividad de su centro en la plataforma. Este reporte tiene:</p>
                <ul>
                    <li>Cantidad de tiempo accesado por miembros del centro.</li>
                    <li>Tiempo promedio en plataforma por estudiante.</li>
                    <li>Tiempo promedio para resolución de exámenes.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade reports-students" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reportes Estudiantes </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El centro educativo puede generar un reporte de la actividad de su centro en la plataforma. Este reporte tiene:</p>
                <ul>
                    <li>Acceso de Miembros a plataforma.</li>
                    <li>Tiempo de acceso a plataforma integrantes centro.</li>
                    <li>Actividad del estudiante.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

@endsection
