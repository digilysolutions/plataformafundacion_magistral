@extends('layouts.app-admin')

@section('title-header-admin')
Reportes
@endsection
@section('css')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
    body {
        font-family: sans-serif;
        background-color: #f0f8ff;
        padding: 20px;
        color: #333;
    }
    h1 {
        color: #32BDEA !important; text-align: center; margin-bottom: 30px;
    }
    h2 {
        color: #32BDEA !important; text-align: center; margin-bottom: 15px; margin-top: 40px;
        border-top: 2px solid #90caf9; padding-top: 20px;
    }
    .section-container {
        margin-bottom: 40px;
    }
    .chart-container {
        background-color: #ffffff;
        padding: 20px;
        border: 1px solid #90caf9;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 139, 0.08);
        min-height: 420px;
    }
    .filters {
        background-color: #e3f2fd;
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px solid #cce5ff;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        align-items: center;
    }
    .filters > div {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .filters label {
        font-weight: bold;
        color: #FF7E41 !important;
        font-size: 0.9em;
    }
    .filters select, .filters input {
        padding: 8px;
        border: 1px solid #bbdefb;
        border-radius: 4px;
        font-size: 0.9em;
    }
    #pisaSection .filters { border-left: 5px solid #1976d2; }
    #nationalSection .filters { border-left: 5px solid #4CAF50; }
    #diagnosticSection .filters { border-left: 5px solid #ff9800; }
</style>
@endsection
@section('content-admin')
<h1>Análisis Interactivo de Resultados de Exámenes</h1>

<div class="row">
    <!-- === SECCIÓN PISA === -->
    <div class="section-container col-lg-12" id="pisaSection">
        <h2>Pruebas PISA</h2>
        <div class="filters">
            <div>
                <label for="filterPisaExamen">Examen:</label>
                <select id="filterPisaExamen">
                    <option value="Todos">Todos</option>
                    <option value="PISA 2022 - Lectura">PISA 2022 - Lectura</option>
                    <option value="PISA 2022 - Matemáticas">PISA 2022 - Matemáticas</option>
                    <option value="PISA 2022 - Ciencias">PISA 2022 - Ciencias</option>
                    <option value="PISA 2023 - Lectura">PISA 2023 - Lectura</option>
                    <option value="PISA 2023 - Matemáticas">PISA 2023 - Matemáticas</option>
                    <option value="PISA 2023 - Ciencias">PISA 2023 - Ciencias</option>
                </select>
            </div>
            <div>
                <label>Nivel:</label>
                <select id="filterPisaNivelMin">
                    <option value="1">1</option> <option value="2">2</option> <option value="3">3</option>
                    <option value="4">4</option> <option value="5">5</option> <option value="6">6</option>
                </select>
                <span>-</span>
                <select id="filterPisaNivelMax">
                    <option value="1">1</option> <option value="2">2</option> <option value="3">3</option>
                    <option value="4">4</option> <option value="5">5</option> <option value="6" selected>6</option>
                </select>
            </div>
        </div>
        <div class="chart-container">
            <div id="pisaChart_div"></div>
        </div>
    </div>

    <!-- === SECCIÓN NACIONALES === -->
    <div class="section-container col-lg-6" id="nationalSection">
        <h2>Pruebas Nacionales</h2>
        <div class="filters">
             <div>
                <label for="filterNatExamen">Examen:</label>
                <select id="filterNatExamen">
                    <option value="Todos">Todos</option>
                    <option value="Nacional 2023">Nacional 2023</option>
                    <option value="Nacional 2024">Nacional 2024</option>
                </select>
            </div>
            <div>
                <label for="filterNatAsignatura">Asignatura:</label>
                <select id="filterNatAsignatura">
                    <option value="Todos">Todas</option>
                    <option value="Español">Español</option>
                    <option value="Matemáticas">Matemáticas</option>
                    <option value="Ciencias Sociales">Ciencias Sociales</option>
                    <option value="Ciencias Naturales">Ciencias Naturales</option>
                </select>
            </div>
             <div>
                <label for="filterNatEstado">Estado:</label>
                <select id="filterNatEstado">
                    <option value="Todos">Todos</option>
                    <option value="Aprobado">Aprobado</option>
                    <option value="Reprobado">Reprobado</option>
                </select>
            </div>
        </div>
        <div class="chart-container">
            <div id="nationalChart_div"></div>
        </div>
    </div>

    <!-- === SECCIÓN DIAGNÓSTICOS === -->
     <div class="section-container col-lg-6" id="diagnosticSection">
        <h2>Exámenes Diagnósticos</h2>
         <div class="filters">
            <div>
                <label for="filterDiagExamen">Examen:</label>
                <select id="filterDiagExamen">
                    <option value="Todos">Todos</option>
                    <option value="Diagnóstico Inicial 2024">Diagnóstico Inicial 2024</option>
                    <option value="Diagnóstico Mitad de Año 2024">Diagnóstico Mitad de Año 2024</option>
                </select>
            </div>
            <div>
                <label for="filterDiagComponente">Componente:</label>
                <select id="filterDiagComponente">
                    <option value="Todos">Todos</option>
                    <option value="Comprensión Lectora">Comprensión Lectora</option>
                    <option value="Razonamiento Matemático">Razonamiento Matemático</option>
                    <option value="Ciencias Naturales">Ciencias Naturales</option>
                    <option value="Ciencias Sociales">Ciencias Sociales</option>
                    <option value="Resolución de Problemas">Resolución de Problemas</option>
                </select>
            </div>
        </div>
        <div class="chart-container">
            <div id="diagnosticChart_div"></div>
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
@section('js')

<script type="text/javascript">
    // Cargar Google Charts
    google.charts.load('current', {'packages':['corechart', 'table']});
    google.charts.setOnLoadCallback(initializeAllCharts);

    // --- Variables Globales ---
    let pisaDataTable, nationalDataTable, diagnosticDataTable;
    let pisaChart, nationalChart, diagnosticChart;
    let pisaChartDiv, nationalChartDiv, diagnosticChartDiv;

    // --- Datos ---
    const pisaData = [
        { estudiante: "Ana Martínez Pérez", examen: "PISA 2022 - Lectura", fecha: "2023-10-25", tiempo: "2 h 15 min", nivel: 4 }, { estudiante: "Carlos Gómez Rodríguez", examen: "PISA 2022 - Matemáticas", fecha: "2023-10-26", tiempo: "2 h 28 min", nivel: 3 }, { estudiante: "Laura Fernández Díaz", examen: "PISA 2022 - Ciencias", fecha: "2023-10-27", tiempo: "2 h 05 min", nivel: 5 }, { estudiante: "David Sánchez López", examen: "PISA 2023 - Lectura", fecha: "2024-03-15", tiempo: "1 h 55 min", nivel: 4 }, { estudiante: "Sofía Ramírez García", examen: "PISA 2023 - Matemáticas", fecha: "2024-03-16", tiempo: "2 h 10 min", nivel: 5 }, { estudiante: "Javier Torres Ruiz", examen: "PISA 2023 - Ciencias", fecha: "2024-03-17", tiempo: "2 h 25 min", nivel: 3 }, { estudiante: "Elena Jiménez Vázquez", examen: "PISA 2022 - Lectura", fecha: "2023-11-01", tiempo: "2 h 20 min", nivel: 2 }, { estudiante: "Miguel Moreno Castillo", examen: "PISA 2022 - Matemáticas", fecha: "2023-11-02", tiempo: "1 h 48 min", nivel: 4 }, { estudiante: "Paula Navarro Gil", examen: "PISA 2023 - Ciencias", fecha: "2024-04-01", tiempo: "2 h 00 min", nivel: 6 }, { estudiante: "Adrián Domínguez Santos", examen: "PISA 2023 - Matemáticas", fecha: "2024-04-02", tiempo: "2 h 29 min", nivel: 3 }
    ];
    const nationalData = [
        { estudiante: "Luisa Cabrera Méndez", examen: "Nacional 2023", asignatura: "Español", fecha: "2023-06-10", tiempo: "1 h 45 min", calificacion: 85, estado: "Aprobado" }, { estudiante: "Marcos Peña Sosa", examen: "Nacional 2023", asignatura: "Matemáticas", fecha: "2023-06-11", tiempo: "1 h 58 min", calificacion: 42, estado: "Reprobado" }, { estudiante: "Valeria Núñez Rojas", examen: "Nacional 2023", asignatura: "Ciencias Sociales", fecha: "2023-06-12", tiempo: "1 h 30 min", calificacion: 78, estado: "Aprobado" }, { estudiante: "Ricardo Alvarez Cruz", examen: "Nacional 2023", asignatura: "Ciencias Naturales", fecha: "2023-06-13", tiempo: "1 h 50 min", calificacion: 91, estado: "Aprobado" }, { estudiante: "Camila Herrera Castro", examen: "Nacional 2024", asignatura: "Español", fecha: "2024-06-10", tiempo: "1 h 55 min", calificacion: 55, estado: "Reprobado" }, { estudiante: "Andrés Medina León", examen: "Nacional 2024", asignatura: "Matemáticas", fecha: "2024-06-11", tiempo: "1 h 40 min", calificacion: 68, estado: "Aprobado" }, { estudiante: "Isabella Vargas Blanco", examen: "Nacional 2024", asignatura: "Ciencias Sociales", fecha: "2024-06-12", tiempo: "1 h 48 min", calificacion: 30, estado: "Reprobado" }, { estudiante: "Mateo Santana Romero", examen: "Nacional 2024", asignatura: "Ciencias Naturales", fecha: "2024-06-13", tiempo: "1 h 35 min", calificacion: 72, estado: "Aprobado" }, { estudiante: "Daniela Reyes Flores", examen: "Nacional 2023", asignatura: "Matemáticas", fecha: "2023-06-11", tiempo: "1 h 25 min", calificacion: 95, estado: "Aprobado" }, { estudiante: "Diego Silva Muñoz", examen: "Nacional 2024", asignatura: "Español", fecha: "2024-06-10", tiempo: "1 h 59 min", calificacion: 61, estado: "Aprobado" }
    ];
    const diagnosticData = [
        { estudiante: "Alejandro Rojas Vidal", examen: "Diagnóstico Inicial 2024", componente: "Comprensión Lectora", fecha: "2024-01-15", tiempo: "55 min", puntuacion: 310 }, { estudiante: "Beatriz Gil Fernández", examen: "Diagnóstico Inicial 2024", componente: "Razonamiento Matemático", fecha: "2024-01-15", tiempo: "1 h 10 min", puntuacion: 285 }, { estudiante: "Carlos Fuentes Soler", examen: "Diagnóstico Mitad de Año 2024", componente: "Ciencias Naturales", fecha: "2024-05-20", tiempo: "1 h 00 min", puntuacion: 340 }, { estudiante: "Diana Mora Ortiz", examen: "Diagnóstico Mitad de Año 2024", componente: "Ciencias Sociales", fecha: "2024-05-20", tiempo: "48 min", puntuacion: 260 }, { estudiante: "Esteban Solís Vega", examen: "Diagnóstico Inicial 2024", componente: "Resolución de Problemas", fecha: "2024-01-16", tiempo: "1 h 15 min", puntuacion: 305 }, { estudiante: "Fernanda Ponce Bravo", examen: "Diagnóstico Inicial 2024", componente: "Comprensión Lectora", fecha: "2024-01-16", tiempo: "50 min", puntuacion: 290 }, { estudiante: "Gabriel Castro Salas", examen: "Diagnóstico Mitad de Año 2024", componente: "Razonamiento Matemático", fecha: "2024-05-21", tiempo: "1 h 05 min", puntuacion: 365 }, { estudiante: "Helena Ibáñez Parra", examen: "Diagnóstico Mitad de Año 2024", componente: "Ciencias Naturales", fecha: "2024-05-21", tiempo: "1 h 12 min", puntuacion: 240 }, { estudiante: "Ignacio Duran Soto", examen: "Diagnóstico Inicial 2024", componente: "Ciencias Sociales", fecha: "2024-01-17", tiempo: "58 min", puntuacion: 325 }, { estudiante: "Jimena Cárdenas Rivas", examen: "Diagnóstico Inicial 2024", componente: "Razonamiento Matemático", fecha: "2024-01-17", tiempo: "1 h 20 min", puntuacion: 275 }
    ];

    // --- Inicialización ---
    function initializeAllCharts() {
        // PISA
        pisaChartDiv = document.getElementById('pisaChart_div');
        pisaDataTable = new google.visualization.DataTable();
        pisaDataTable.addColumn('string', 'Estudiante'); pisaDataTable.addColumn('string', 'Examen PISA');
        pisaDataTable.addColumn('date', 'Fecha'); pisaDataTable.addColumn('string', 'Tiempo'); pisaDataTable.addColumn('number', 'Nivel');
        pisaData.forEach(item => pisaDataTable.addRow([item.estudiante, item.examen, new Date(item.fecha), item.tiempo, item.nivel]));
        pisaChart = new google.visualization.BarChart(pisaChartDiv);
        document.getElementById('filterPisaExamen').addEventListener('change', applyPisaFiltersAndRedraw);
        document.getElementById('filterPisaNivelMin').addEventListener('change', applyPisaFiltersAndRedraw);
        document.getElementById('filterPisaNivelMax').addEventListener('change', applyPisaFiltersAndRedraw);
        applyPisaFiltersAndRedraw();

        // Nacionales
        nationalChartDiv = document.getElementById('nationalChart_div');
        nationalDataTable = new google.visualization.DataTable();
        nationalDataTable.addColumn('string', 'Estudiante'); nationalDataTable.addColumn('string', 'Examen');
        nationalDataTable.addColumn('string', 'Asignatura'); nationalDataTable.addColumn('date', 'Fecha');
        nationalDataTable.addColumn('string', 'Tiempo'); nationalDataTable.addColumn('number', 'Calificacion'); nationalDataTable.addColumn('string', 'Estado');
        nationalData.forEach(item => nationalDataTable.addRow([item.estudiante, item.examen, item.asignatura, new Date(item.fecha), item.tiempo, item.calificacion, item.estado]));
        nationalChart = new google.visualization.Histogram(nationalChartDiv);
        document.getElementById('filterNatExamen').addEventListener('change', applyNationalFiltersAndRedraw);
        document.getElementById('filterNatAsignatura').addEventListener('change', applyNationalFiltersAndRedraw);
        document.getElementById('filterNatEstado').addEventListener('change', applyNationalFiltersAndRedraw);
        applyNationalFiltersAndRedraw();

        // Diagnósticos
        diagnosticChartDiv = document.getElementById('diagnosticChart_div');
        diagnosticDataTable = new google.visualization.DataTable();
        diagnosticDataTable.addColumn('string', 'Estudiante'); diagnosticDataTable.addColumn('string', 'Examen');
        diagnosticDataTable.addColumn('string', 'Componente'); diagnosticDataTable.addColumn('date', 'Fecha');
        diagnosticDataTable.addColumn('string', 'Tiempo'); diagnosticDataTable.addColumn('number', 'Puntuacion');
        diagnosticData.forEach(item => diagnosticDataTable.addRow([item.estudiante, item.examen, item.componente, new Date(item.fecha), item.tiempo, item.puntuacion]));
        diagnosticChart = new google.visualization.Histogram(diagnosticChartDiv);
        document.getElementById('filterDiagExamen').addEventListener('change', applyDiagnosticFiltersAndRedraw);
        document.getElementById('filterDiagComponente').addEventListener('change', applyDiagnosticFiltersAndRedraw);
        applyDiagnosticFiltersAndRedraw();
    }

    // --- Funciones de Filtrado y Redibujo (CORREGIDAS) ---

    // PISA
    function applyPisaFiltersAndRedraw() {
        const selectedExamen = document.getElementById('filterPisaExamen').value;
        const minLevel = parseInt(document.getElementById('filterPisaNivelMin').value, 10);
        const maxLevel = parseInt(document.getElementById('filterPisaNivelMax').value, 10);

        const view = new google.visualization.DataView(pisaDataTable);
        const rowsToInclude = [];
        for (let i = 0; i < pisaDataTable.getNumberOfRows(); i++) {
            const examen = pisaDataTable.getValue(i, 1);
            const nivel = pisaDataTable.getValue(i, 4);
            if ((selectedExamen === 'Todos' || examen === selectedExamen) && (nivel >= minLevel && nivel <= maxLevel)) {
                rowsToInclude.push(i);
            }
        }
        view.setRows(rowsToInclude);

        // Validar si hay datos después de filtrar
        if (view.getNumberOfRows() > 0) {
             const groupedData = google.visualization.data.group(view,
                [{ column: 4, modifier: (v) => `Nivel ${v}`, type: 'string' }],
                [{ column: 4, aggregation: google.visualization.data.count, type: 'number', label: 'Nº Estudiantes' }]
            );
            const options = {
                title: 'Distribución de Estudiantes por Nivel PISA',
                chartArea: {width: '70%', height: '70%'},
                hAxis: { title: 'Número de Estudiantes', minValue: 0 },
                vAxis: { title: 'Nivel PISA Alcanzado' },
                legend: { position: 'none' },
                colors: ['#1976d2'], // Azul PISA
                bars: 'horizontal'
            };
            pisaChart.draw(groupedData, options);
         } else {
             pisaChart.clearChart();
             pisaChartDiv.innerHTML = '<p style="text-align:center; padding-top:50px; color:#555;">No hay datos para mostrar con los filtros seleccionados.</p>';
         }
    }

    // Nacionales
    function applyNationalFiltersAndRedraw() {
        const selectedExamen = document.getElementById('filterNatExamen').value;
        const selectedAsignatura = document.getElementById('filterNatAsignatura').value;
        const selectedEstado = document.getElementById('filterNatEstado').value;

        const view = new google.visualization.DataView(nationalDataTable);
        const rowsToInclude = [];
        for (let i = 0; i < nationalDataTable.getNumberOfRows(); i++) {
            const examen = nationalDataTable.getValue(i, 1);
            const asignatura = nationalDataTable.getValue(i, 2);
            const estado = nationalDataTable.getValue(i, 6);
            if ((selectedExamen === 'Todos' || examen === selectedExamen) &&
                (selectedAsignatura === 'Todos' || asignatura === selectedAsignatura) &&
                (selectedEstado === 'Todos' || estado === selectedEstado)) {
                rowsToInclude.push(i);
            }
        }
        view.setRows(rowsToInclude);

        if (view.getNumberOfRows() > 0) {
            // Crear vista específica para el histograma
            const histogramView = new google.visualization.DataView(view);
            histogramView.setColumns([5]); // Índice 5: Calificacion

            const options = {
                title: 'Distribución de Calificaciones en Pruebas Nacionales',
                legend: { position: 'none' },
                colors: ['#4CAF50'], // Verde Nacionales
                hAxis: { title: 'Calificación (/100)', minValue: 0, maxValue: 100 },
                vAxis: { title: 'Número de Estudiantes', minValue: 0 }, // Asegurar que el eje Y empiece en 0
                histogram: {
                     bucketSize: 10,
                     minValue: 0,
                     maxValue: 100
                 }
            };
            nationalChart.draw(histogramView, options);
        } else {
             nationalChart.clearChart();
             nationalChartDiv.innerHTML = '<p style="text-align:center; padding-top:50px; color:#555;">No hay datos para mostrar con los filtros seleccionados.</p>';
        }
    }

    // Diagnósticos
    function applyDiagnosticFiltersAndRedraw() {
        const selectedExamen = document.getElementById('filterDiagExamen').value;
        const selectedComponente = document.getElementById('filterDiagComponente').value;

        const view = new google.visualization.DataView(diagnosticDataTable);
        const rowsToInclude = [];
        for (let i = 0; i < diagnosticDataTable.getNumberOfRows(); i++) {
            const examen = diagnosticDataTable.getValue(i, 1);
            const componente = diagnosticDataTable.getValue(i, 2);
            if ((selectedExamen === 'Todos' || examen === selectedExamen) &&
                (selectedComponente === 'Todos' || componente === selectedComponente)) {
                rowsToInclude.push(i);
            }
        }
        view.setRows(rowsToInclude);

        if (view.getNumberOfRows() > 0) {
             // Crear vista específica para el histograma
            const histogramView = new google.visualization.DataView(view);
            histogramView.setColumns([5]); // Índice 5: Puntuacion

            const options = {
                title: 'Distribución de Puntuaciones en Exámenes Diagnósticos',
                legend: { position: 'none' },
                colors: ['#ff9800'], // Naranja Diagnósticos
                hAxis: { title: 'Puntuación (Escala 300±50)'},
                vAxis: { title: 'Número de Estudiantes', minValue: 0 }, // Asegurar que el eje Y empiece en 0
                histogram: {
                     // bucketSize: 25,
                     minValue: 200,
                     maxValue: 400
                 }
            };
            diagnosticChart.draw(histogramView, options);
        } else {
            diagnosticChart.clearChart();
            diagnosticChartDiv.innerHTML = '<p style="text-align:center; padding-top:50px; color:#555;">No hay datos para mostrar con los filtros seleccionados.</p>';
        }
    }

</script>
@endsection
