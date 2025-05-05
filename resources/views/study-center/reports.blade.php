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

    body { font-family: sans-serif; background-color: #f0f8ff; padding: 20px; color: #333; }
    h1 { color: #0d47a1; text-align: center; margin-bottom: 30px; }
    .chart-container { width: 95%; max-width: 1100px; margin: 30px auto; padding: 20px; background-color: #ffffff; border: 1px solid #42a5f5; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 139, 0.1); }
    .filter-container { display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; margin-bottom: 20px; padding: 15px; background-color: #e3f2fd; border-radius: 8px; border: 1px solid #bbdefb; }
    .filter-group { display: flex; align-items: center; }
    .filter-container label { font-weight: bold; color: #1565c0; margin-right: 5px; white-space: nowrap; }
    .filter-container select { padding: 5px 8px; border: 1px solid #90caf9; border-radius: 4px; background-color: #ffffff; min-width: 100px; }
    .button-container { text-align: center; margin-bottom: 30px; }
    .report-btn { padding: 10px 25px; background-color: #1976d2; color: white; font-size: 1.05em; font-weight: bold; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease; }
    .report-btn:hover { background-color: #1565c0; }
    .google-visualization-chart { min-height: 550px; }
    #loading-message, #error-message, #chart-message { text-align: center; color: #1565c0; font-style: italic; padding: 20px; }
    #error-message { color: #d32f2f; font-weight: bold; display: none; }
    #chart-message { color: grey; display: none; }
    .custom-legend { text-align: center; margin-top: 20px; padding: 15px; background-color: #eef5ff; border-radius: 6px; border: 1px solid #cce0ff; max-width: 800px; margin-left: auto; margin-right: auto; }
    .legend-section { margin-bottom: 10px; }
    .legend-section:last-child { margin-bottom: 0; }
    .legend-title { font-weight: bold; color: #0d47a1; font-size: 0.9em; display: block; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px; }
    .legend-item { display: inline-flex; align-items: center; margin-right: 15px; margin-bottom: 5px; font-size: 0.9em; }
    .legend-color-swatch { display: inline-block; width: 12px; height: 12px; border-radius: 3px; margin-right: 5px; border: 1px solid rgba(0,0,0,0.2); flex-shrink: 0; }
    .table-summary-container { width: 95%; max-width: 800px; margin: 30px auto; padding: 20px; background-color: #ffffff; border: 1px solid #42a5f5; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 139, 0.1); overflow-x: auto; display: none; }
    .summary-table .google-visualization-table-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    .summary-table .google-visualization-table-th, .summary-table .google-visualization-table-td { border: 1px solid #bbdefb; padding: 10px 12px; text-align: left; font-size: 0.9em; white-space: normal; }
    .summary-table .google-visualization-table-th { background-color: #e3f2fd; color: #0d47a1; font-weight: bold; }
    .summary-table .google-visualization-table-tr-even { background-color: #f8fcff; }
    .summary-table .google-visualization-table-tr-odd { background-color: #ffffff; }
    .summary-table .google-visualization-table-td.google-visualization-table-type-number { text-align: center; font-weight: 500; }
    .print-button-container { text-align: right; margin-top: -10px; margin-right: 5px; }
    .print-btn { padding: 5px 15px; font-size: 0.9em; background-color: #6c757d; color: white; border: none; border-radius: 4px; cursor: pointer; }
    .print-btn:hover { background-color: #5a6268; }
    @media print { body * { visibility: hidden; } .printable-area, .printable-area * { visibility: visible; } .printable-area { position: absolute; left: 0; top: 0; width: 100%; margin: 0; padding: 0; border: none; box-shadow: none; } .filter-container, .button-container, .print-button-container, h1, #loading-message, #error-message, .custom-legend, #chart-message { display: none !important; } .summary-table .google-visualization-table-table { border: 1px solid #ccc; font-size: 10pt; } .summary-table .google-visualization-table-th { background-color: #eee !important; color: #000 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; } .summary-table .google-visualization-table-td { border: 1px solid #ddd; padding: 5px; } }

</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('51', {'packages':['corechart', 'table']});
        google.charts.setOnLoadCallback(initializeDashboard);

        // --- Datos Crudos (100 Registros) ---
         const pisaDataRaw = [
            ['Ana Martínez Pérez', 'PISA 2022 - Lectura', '2023-10-25', '2 h 15 min', 4], ['Carlos Gómez Rodríguez', 'PISA 2022 - Matemáticas', '2023-10-26', '2 h 28 min', 3], ['Laura Fernández Díaz', 'PISA 2022 - Ciencias', '2023-10-27', '2 h 05 min', 5], ['David Sánchez López', 'PISA 2023 - Lectura', '2024-03-15', '1 h 55 min', 4], ['Sofía Ramírez García', 'PISA 2023 - Matemáticas', '2024-03-16', '2 h 10 min', 5], ['Javier Torres Ruiz', 'PISA 2023 - Ciencias', '2024-03-17', '2 h 25 min', 3], ['Elena Jiménez Vázquez', 'PISA 2022 - Lectura', '2023-11-01', '2 h 20 min', 2], ['Miguel Moreno Castillo', 'PISA 2022 - Matemáticas', '2023-11-02', '1 h 48 min', 4], ['Paula Navarro Gil', 'PISA 2023 - Ciencias', '2024-04-01', '2 h 00 min', 6], ['Adrián Domínguez Santos', 'PISA 2023 - Matemáticas', '2024-04-02', '2 h 29 min', 3], ['Adriana Campos Solano', 'PISA 2023 - Lectura', '2023-02-15', '2 h 01 min', 4], ['Bruno Duarte Vega', 'PISA 2023 - Matemáticas', '2023-03-10', '2 h 19 min', 3], ['Carla Mendoza Ríos', 'PISA 2023 - Ciencias', '2023-04-22', '1 h 58 min', 5], ['Daniel Soto Castro', 'PISA 2023 - Lectura', '2023-05-08', '2 h 11 min', 4], ['Estefanía Mora Núñez', 'PISA 2023 - Matemáticas', '2023-06-20', '1 h 45 min', 6], ['Fabián Rojas Ortiz', 'PISA 2023 - Ciencias', '2023-07-14', '2 h 25 min', 3], ['Gabriela Solís León', 'PISA 2023 - Lectura', '2023-08-02', '2 h 09 min', 5], ['Hugo Vargas Salas', 'PISA 2023 - Matemáticas', '2023-09-18', '2 h 28 min', 2], ['Inés Herrera Blanco', 'PISA 2023 - Ciencias', '2023-10-05', '1 h 55 min', 4], ['Julián Medina Romero', 'PISA 2023 - Lectura', '2023-10-28', '2 h 13 min', 3], ['Karla Reyes Muñoz', 'PISA 2023 - Matemáticas', '2023-11-11', '2 h 03 min', 5], ['Leonardo Silva Flores', 'PISA 2023 - Ciencias', '2023-11-29', '2 h 17 min', 4], ['Marcela Castro Gil', 'PISA 2023 - Lectura', '2023-12-15', '1 h 59 min', 4], ['Natalia Domínguez Parra', 'PISA 2024 - Lectura', '2024-01-20', '2 h 05 min', 5], ['Óscar Navarro Soto', 'PISA 2024 - Matemáticas', '2024-01-29', '2 h 22 min', 3], ['Patricia Santos Rivas', 'PISA 2024 - Ciencias', '2024-02-10', '1 h 50 min', 6], ['Ricardo Moreno Vidal', 'PISA 2024 - Lectura', '2024-02-25', '2 h 18 min', 4], ['Sandra Jiménez Fernández', 'PISA 2024 - Matemáticas', '2024-03-08', '2 h 08 min', 4], ['Tomás Torres García', 'PISA 2024 - Ciencias', '2024-03-21', '2 h 29 min', 3], ['Valeria Ramírez Ruiz', 'PISA 2024 - Lectura', '2024-04-05', '1 h 49 min', 5], ['William Sánchez Díaz', 'PISA 2024 - Matemáticas', '2024-04-19', '2 h 14 min', 5], ['Ximena López Pérez', 'PISA 2024 - Ciencias', '2024-05-03', '2 h 01 min', 4], ['Yago Martínez Rodríguez', 'PISA 2024 - Lectura', '2024-05-17', '2 h 20 min', 3], ['Zoe Gómez Gil', 'PISA 2024 - Matemáticas', '2024-06-01', '1 h 53 min', 6], ['Andrés Campos Solano', 'PISA 2024 - Ciencias', '2024-06-15', '2 h 26 min', 2], ['Beatriz Duarte Vega', 'PISA 2024 - Lectura', '2024-07-02', '2 h 07 min', 4], ['Camilo Mendoza Ríos', 'PISA 2024 - Matemáticas', '2024-07-18', '2 h 11 min', 5], ['Diana Soto Castro', 'PISA 2024 - Ciencias', '2024-08-04', '1 h 59 min', 4], ['Eduardo Mora Núñez', 'PISA 2024 - Lectura', '2024-08-20', '2 h 23 min', 3], ['Florencia Rojas Ortiz', 'PISA 2024 - Matemáticas', '2024-09-07', '2 h 00 min', 5], ['Gerardo Solís León', 'PISA 2024 - Ciencias', '2024-09-22', '2 h 16 min', 4], ['Helga Vargas Salas', 'PISA 2024 - Lectura', '2024-10-10', '1 h 51 min', 5], ['Iván Herrera Blanco', 'PISA 2024 - Matemáticas', '2024-10-25', '2 h 27 min', 3]
        ];
        const nationalDataRaw = [
            ['Juan Pérez Gil', 'Nacional 2023', 'Español', '2023-01-10', '1 h 50 min', 75, 'Aprobado'], ['María García Santos', 'Nacional 2023', 'Matemáticas', '2023-01-25', '1 h 59 min', 58, 'Reprobado'], ['José Rodríguez Vidal', 'Nacional 2023', 'Ciencias Sociales', '2023-02-08', '1 h 35 min', 88, 'Aprobado'], ['Ana Martínez Fernández', 'Nacional 2023', 'Ciencias Naturales', '2023-02-21', '1 h 48 min', 62, 'Aprobado'], ['Carlos Gómez Parra', 'Nacional 2023', 'Español', '2023-03-14', '1 h 55 min', 40, 'Reprobado'], ['Laura López Rivas', 'Nacional 2023', 'Matemáticas', '2023-04-03', '1 h 29 min', 92, 'Aprobado'], ['David Sánchez Bravo', 'Nacional 2023', 'Ciencias Sociales', '2023-04-18', '1 h 42 min', 70, 'Aprobado'], ['Sofía Ramírez Salas', 'Nacional 2023', 'Ciencias Naturales', '2023-05-09', '1 h 57 min', 59, 'Reprobado'], ['Javier Torres Castro', 'Nacional 2023', 'Español', '2023-07-04', '1 h 33 min', 81, 'Aprobado'], ['Elena Jiménez León', 'Nacional 2023', 'Matemáticas', '2023-08-16', '1 h 52 min', 65, 'Aprobado'], ['Miguel Moreno Blanco', 'Nacional 2023', 'Ciencias Sociales', '2023-09-05', '1 h 25 min', 96, 'Aprobado'], ['Paula Navarro Romero', 'Nacional 2023', 'Ciencias Naturales', '2023-10-19', '1 h 47 min', 77, 'Aprobado'], ['Adrián Domínguez Muñoz', 'Nacional 2023', 'Español', '2023-11-07', '1 h 58 min', 50, 'Reprobado'], ['Lucía Gil Flores', 'Nacional 2023', 'Matemáticas', '2023-12-01', '1 h 38 min', 89, 'Aprobado'],
            ['Martín Soler Solano', 'Nacional 2024', 'Ciencias Sociales', '2024-01-12', '1 h 44 min', 73, 'Aprobado'], ['Valentina Ortiz Vega', 'Nacional 2024', 'Ciencias Naturales', '2024-01-26', '1 h 51 min', 60, 'Aprobado'], ['Mateo Núñez Ríos', 'Nacional 2024', 'Español', '2024-02-09', '1 h 39 min', 90, 'Aprobado'], ['Camila Cruz Mendoza', 'Nacional 2024', 'Matemáticas', '2024-02-23', '1 h 56 min', 45, 'Reprobado'], ['Sebastián Alvarez Soto', 'Nacional 2024', 'Ciencias Sociales', '2024-03-11', '1 h 28 min', 84, 'Aprobado'], ['Isabella Santana Parra', 'Nacional 2024', 'Ciencias Naturales', '2024-03-25', '1 h 49 min', 71, 'Aprobado'], ['Lucas Vargas Rivas', 'Nacional 2024', 'Español', '2024-04-08', '1 h 59 min', 35, 'Reprobado'], ['Emma Reyes Bravo', 'Nacional 2024', 'Matemáticas', '2024-04-22', '1 h 31 min', 98, 'Aprobado'], ['Nicolás Silva Salas', 'Nacional 2024', 'Ciencias Sociales', '2024-05-06', '1 h 46 min', 67, 'Aprobado'], ['Julieta Medina Castro', 'Nacional 2024', 'Ciencias Naturales', '2024-05-20', '1 h 53 min', 79, 'Aprobado'], ['Benjamín Herrera León', 'Nacional 2024', 'Español', '2024-06-04', '1 h 37 min', 86, 'Aprobado'], ['Renata Vargas Blanco', 'Nacional 2024', 'Matemáticas', '2024-06-18', '1 h 58 min', 52, 'Reprobado'], ['Emiliano Moreno Romero', 'Nacional 2024', 'Ciencias Sociales', '2024-07-03', '1 h 22 min', 93, 'Aprobado'], ['Victoria Navarro Muñoz', 'Nacional 2024', 'Ciencias Naturales', '2024-07-17', '1 h 41 min', 74, 'Aprobado'], ['Thiago Domínguez Flores', 'Nacional 2024', 'Español', '2024-08-01', '1 h 54 min', 63, 'Aprobado'], ['Regina Gil Santos', 'Nacional 2024', 'Matemáticas', '2024-08-15', '1 h 36 min', 80, 'Aprobado'], ['Santino Soler García', 'Nacional 2024', 'Ciencias Sociales', '2024-09-02', '1 h 43 min', 57, 'Reprobado'], ['Mía Ortiz Pérez', 'Nacional 2024', 'Ciencias Naturales', '2024-09-16', '1 h 50 min', 82, 'Aprobado'], ['Bautista Núñez Rodríguez', 'Nacional 2024', 'Español', '2024-10-07', '1 h 30 min', 91, 'Aprobado'], ['Catalina Cruz Vidal', 'Nacional 2024', 'Matemáticas', '2024-10-21', '1 h 57 min', 48, 'Reprobado']
        ];
        const diagnosticDataRaw = [
             ['Felipe Alvarez Fernández', 'Diagnóstico Inicio 2023', 'Comprensión Lectora', '2023-01-18', '58 min', 295], ['Martina Santana Gil', 'Diagnóstico Inicio 2023', 'Razonamiento Matemático', '2023-01-18', '1 h 12 min', 315], ['Joaquín Vargas Parra', 'Diagnóstico Inicio 2023', 'Ciencias Naturales', '2023-02-14', '1 h 05 min', 270], ['Amanda Reyes Rivas', 'Diagnóstico Inicio 2023', 'Ciencias Sociales', '2023-03-09', '52 min', 330], ['Lorenzo Silva Bravo', 'Diagnóstico Inicio 2023', 'Resolución de Problemas', '2023-04-04', '1 h 18 min', 280], ['Elena Medina Salas', 'Diagnóstico Mitad 2023', 'Comprensión Lectora', '2023-05-16', '55 min', 305], ['Simón Herrera Castro', 'Diagnóstico Mitad 2023', 'Razonamiento Matemático', '2023-06-14', '1 h 08 min', 350], ['Clara Vargas León', 'Diagnóstico Mitad 2023', 'Ciencias Naturales', '2023-07-11', '1 h 02 min', 255], ['Vicente Moreno Blanco', 'Diagnóstico Mitad 2023', 'Ciencias Sociales', '2023-08-08', '50 min', 310], ['Abril Navarro Romero', 'Diagnóstico Final 2023', 'Resolución de Problemas', '2023-09-12', '1 h 22 min', 290], ['Facundo Domínguez Muñoz', 'Diagnóstico Final 2023', 'Comprensión Lectora', '2023-10-17', '59 min', 320], ['Olivia Gil Flores', 'Diagnóstico Final 2023', 'Razonamiento Matemático', '2023-11-14', '1 h 15 min', 265], ['Agustín Soler Santos', 'Diagnóstico Final 2023', 'Ciencias Naturales', '2023-12-05', '1 h 10 min', 345],
             ['Bianca Ortiz García', 'Diagnóstico Inicio 2024', 'Ciencias Sociales', '2024-01-22', '53 min', 300], ['Dante Núñez Pérez', 'Diagnóstico Inicio 2024', 'Resolución de Problemas', '2024-02-06', '1 h 11 min', 275], ['Josefina Cruz Rodríguez', 'Diagnóstico Inicio 2024', 'Comprensión Lectora', '2024-02-20', '56 min', 315], ['Ignacio Alvarez Vidal', 'Diagnóstico Inicio 2024', 'Razonamiento Matemático', '2024-03-05', '1 h 07 min', 335], ['Paulina Santana Fernández', 'Diagnóstico Inicio 2024', 'Ciencias Naturales', '2024-03-19', '1 h 03 min', 280], ['Lautaro Vargas Gil', 'Diagnóstico Mitad 2024', 'Ciencias Sociales', '2024-04-09', '51 min', 325], ['Guadalupe Reyes Parra', 'Diagnóstico Mitad 2024', 'Resolución de Problemas', '2024-04-23', '1 h 19 min', 295], ['Francisco Silva Rivas', 'Diagnóstico Mitad 2024', 'Comprensión Lectora', '2024-05-07', '57 min', 305], ['Alma Medina Bravo', 'Diagnóstico Mitad 2024', 'Razonamiento Matemático', '2024-05-21', '1 h 13 min', 360], ['Esteban Herrera Salas', 'Diagnóstico Mitad 2024', 'Ciencias Naturales', '2024-06-05', '1 h 06 min', 250], ['Rosario Vargas Castro', 'Diagnóstico Mitad 2024', 'Ciencias Sociales', '2024-06-19', '49 min', 315], ['Ciro Moreno León', 'Diagnóstico Final 2024', 'Resolución de Problemas', '2024-07-09', '1 h 25 min', 300], ['Malena Navarro Blanco', 'Diagnóstico Final 2024', 'Comprensión Lectora', '2024-07-23', '1 h 01 min', 330], ['Fermín Domínguez Romero', 'Diagnóstico Final 2024', 'Razonamiento Matemático', '2024-08-06', '1 h 16 min', 270], ['Ámbar Gil Muñoz', 'Diagnóstico Final 2024', 'Ciencias Naturales', '2024-08-20', '1 h 09 min', 355], ['Itzel Soler Flores', 'Diagnóstico Final 2024', 'Ciencias Sociales', '2024-09-04', '54 min', 320], ['Gaspar Ortiz Santos', 'Diagnóstico Final 2024', 'Resolución de Problemas', '2024-09-18', '1 h 14 min', 290], ['Miranda Núñez García', 'Diagnóstico Final 2024', 'Comprensión Lectora', '2024-10-08', '58 min', 310], ['Tadeo Cruz Pérez', 'Diagnóstico Final 2024', 'Razonamiento Matemático', '2024-10-22', '1 h 11 min', 375], ['India Alvarez Rodríguez', 'Diagnóstico Final 2024', 'Ciencias Naturales', '2024-11-06', '1 h 04 min', 230]
        ];
        // --- FIN DATOS CRUDOS ---

        const statusColors = { approved: '#4CAF50', disapproved: '#f44336', unique: '#2196F3' };
        //const examTypeBaseColors = { 'PISA': '#4CAF50', 'Nacionales': '#FF9800', 'Diagnóstico': '#9C27B0' }; // No se usa activamente en esta versión

        let masterDataTable;
        let chartInstance = null;
        let summaryTableInstance = null;
        let chartDiv;
        let tableDiv;

        function initializeDashboard() {
            chartDiv = document.getElementById('exam_count_chart_div');
            tableDiv = document.getElementById('summary_table_div');
            try {
                prepareMasterData();
                populateFilterOptions();
                createCustomLegend();
                document.getElementById('generateReportBtn').addEventListener('click', applyFiltersAndDraw);
                document.getElementById('printTableBtn').addEventListener('click', printTable);
                chartInstance = new google.visualization.ColumnChart(chartDiv);
                summaryTableInstance = new google.visualization.Table(tableDiv);
                document.getElementById('loading-message').style.display = 'none';
                applyFiltersAndDraw();
            } catch (error) {
                console.error("Error durante la inicialización:", error);
                displayError("Ocurrió un error al cargar los datos o el gráfico inicial.");
            }
        }

        function prepareMasterData() {
            masterDataTable = new google.visualization.DataTable();
            masterDataTable.addColumn('string', 'Tipo Examen'); masterDataTable.addColumn('string', 'Estudiante');
            masterDataTable.addColumn('date', 'Fecha'); masterDataTable.addColumn('number', 'Año');
            masterDataTable.addColumn('number', 'Semestre'); masterDataTable.addColumn('number', 'Mes');
            masterDataTable.addColumn('number', 'Día'); masterDataTable.addColumn('number', 'Nivel PISA');
            masterDataTable.addColumn('number', 'Calificacion Nac.'); masterDataTable.addColumn('string', 'Estado Nac.');
            masterDataTable.addColumn('number', 'Puntuacion Diag.');
            const addData = (rawData, type) => { rawData.forEach(row => { let date, student, pisaLevel=null, nacScore=null, nacStatus=null, diagScore=null; if (type === 'PISA') { [student, , date, , pisaLevel] = row; } else if (type === 'Nacionales') { [student, , , date, , nacScore, nacStatus] = row; } else if (type === 'Diagnóstico') { [student, , , date, , diagScore] = row; } const dateObj = new Date(date); if (isNaN(dateObj.getTime())) { console.warn("Fecha inválida:", date, "en fila:", row); return; } masterDataTable.addRow([ type, student, dateObj, dateObj.getFullYear(), Math.floor(dateObj.getMonth() / 6) + 1, dateObj.getMonth(), dateObj.getDate(), pisaLevel, nacScore, nacStatus, diagScore ]); }); };
            addData(pisaDataRaw, 'PISA'); addData(nationalDataRaw, 'Nacionales'); addData(diagnosticDataRaw, 'Diagnóstico');
        }

        function populateFilterOptions() {
             const yearSelect = document.getElementById('filterYear'); const semesterSelect = document.getElementById('filterSemester');
             const monthSelect = document.getElementById('filterMonth'); const daySelect = document.getElementById('filterDay');
             const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
             try { const yearView = new google.visualization.DataView(masterDataTable); yearView.setColumns([3]); const uniqueYears = yearView.getDistinctValues(0).sort((a,b) => a-b); const semesterView = new google.visualization.DataView(masterDataTable); semesterView.setColumns([4]); const uniqueSemesters = semesterView.getDistinctValues(0).sort((a,b) => a-b); yearSelect.innerHTML = '<option value="all">Todos</option>'; uniqueYears.forEach(y => yearSelect.innerHTML += `<option value="${y}">${y}</option>`); semesterSelect.innerHTML = '<option value="all">Todos</option>'; uniqueSemesters.forEach(s => semesterSelect.innerHTML += `<option value="${s}">Semestre ${s}</option>`); monthSelect.innerHTML = '<option value="all">Todos</option>'; for (let m = 0; m < 12; m++) { monthSelect.innerHTML += `<option value="${m}">${monthNames[m]}</option>`; } daySelect.innerHTML = '<option value="all">Todos</option>'; for (let d = 1; d <= 31; d++) { daySelect.innerHTML += `<option value="${d}">${d}</option>`; } } catch (e) { console.error("Error al poblar filtros:", e); displayError("Error al generar las opciones de filtro."); }
        }

        function getExamStatus(dataTable, rowIndex) {
            const PISA_LEVEL_THRESHOLD = 4; const DIAGNOSTIC_SCORE_THRESHOLD = 300;
            const type = dataTable.getValue(rowIndex, 0);
            if (type === 'Nacionales') { return dataTable.getValue(rowIndex, 9) || 'N/A'; }
            else if (type === 'PISA') { const level = dataTable.getValue(rowIndex, 7); return (level !== null && level >= PISA_LEVEL_THRESHOLD) ? 'Aprobado' : 'Reprobado'; }
            else if (type === 'Diagnóstico') { const score = dataTable.getValue(rowIndex, 10); return (score !== null && score >= DIAGNOSTIC_SCORE_THRESHOLD) ? 'Aprobado' : 'Reprobado'; }
            return 'N/A';
        }

        function createCustomLegend() {
             const legendContainer = document.getElementById('customLegendDiv');
             if (!legendContainer) return;
             // Leyenda que explica los colores de las barras (Aprobado/Reprobado/Único)
             legendContainer.innerHTML = ` <div class="legend-section"> <span class="legend-title">Categorías en Gráfico/Tabla</span> <span class="legend-item"> <span class="legend-color-swatch" style="background-color: ${statusColors.approved};"></span> Exámenes Aprobados </span> <span class="legend-item"> <span class="legend-color-swatch" style="background-color: ${statusColors.disapproved};"></span> Exámenes Reprobados </span> <span class="legend-item"> <span class="legend-color-swatch" style="background-color: ${statusColors.unique};"></span> Estudiantes Únicos </span> </div> `;
        }

        function applyFiltersAndDraw() {
            if (!masterDataTable || !chartInstance || !summaryTableInstance || !chartDiv || !tableDiv) { console.warn("Componentes no inicializados."); return; }
            clearError();
            chartInstance.clearChart();
            // No limpiamos la tabla aquí, lo hacemos si no hay datos al final
            setMessage("Generando reporte...", false);
            document.getElementById('summary_table_container').style.display = 'none';

            requestAnimationFrame(() => {
                try {
                    const selectedYear = document.getElementById('filterYear').value;
                    const selectedSemester = document.getElementById('filterSemester').value;
                    const selectedMonth = document.getElementById('filterMonth').value;
                    const selectedDay = document.getElementById('filterDay').value;
                    let filteredRowIndices = null;
                    const filters = [];
                    if (selectedYear !== 'all') filters.push({ column: 3, value: parseInt(selectedYear) });
                    if (selectedSemester !== 'all') filters.push({ column: 4, value: parseInt(selectedSemester) });
                    if (selectedMonth !== 'all') filters.push({ column: 5, value: parseInt(selectedMonth) });
                    if (selectedDay !== 'all') filters.push({ column: 6, value: parseInt(selectedDay) });
                    if (filters.length > 0) { filteredRowIndices = masterDataTable.getFilteredRows(filters); }
                    else { filteredRowIndices = Array.from(Array(masterDataTable.getNumberOfRows()).keys()); }

                    // Agregación
                    const aggregatedData = { 'PISA': { approved: 0, disapproved: 0, uniqueStudents: new Set() }, 'Nacionales': { approved: 0, disapproved: 0, uniqueStudents: new Set() }, 'Diagnóstico': { approved: 0, disapproved: 0, uniqueStudents: new Set() } };
                    filteredRowIndices.forEach(rowIndex => {
                        const examType = masterDataTable.getValue(rowIndex, 0); const student = masterDataTable.getValue(rowIndex, 1);
                        const status = getExamStatus(masterDataTable, rowIndex);
                        if (aggregatedData[examType]) { if (status === 'Aprobado') { aggregatedData[examType].approved++; } else if (status === 'Reprobado') { aggregatedData[examType].disapproved++; } aggregatedData[examType].uniqueStudents.add(student); }
                    });

                    // DataTable para GRÁFICO (Aprobado/Reprobado/Único con Estilo y Tooltip)
                    const chartDataTable = new google.visualization.DataTable();
                    chartDataTable.addColumn('string', 'Tipo de Examen');
                    chartDataTable.addColumn('number', 'Aprobados'); chartDataTable.addColumn({type: 'string', role: 'style'}); chartDataTable.addColumn({type: 'string', role: 'tooltip', p: {html:true}});
                    chartDataTable.addColumn('number', 'Reprobados'); chartDataTable.addColumn({type: 'string', role: 'style'}); chartDataTable.addColumn({type: 'string', role: 'tooltip', p: {html:true}});
                    chartDataTable.addColumn('number', 'Estudiantes Únicos'); chartDataTable.addColumn({type: 'string', role: 'style'}); chartDataTable.addColumn({type: 'string', role: 'tooltip', p: {html:true}});

                    // DataTable para TABLA (Solo Datos Visibles)
                    const tableDataTable = new google.visualization.DataTable();
                    tableDataTable.addColumn('string', 'Tipo de Examen');
                    tableDataTable.addColumn('number', 'Aprobados');
                    tableDataTable.addColumn('number', 'Reprobados');
                    tableDataTable.addColumn('number', 'Estudiantes Únicos');

                    const examTypes = ['PISA', 'Nacionales', 'Diagnóstico'];
                    examTypes.forEach(type => {
                        const approved = aggregatedData[type].approved; const disapproved = aggregatedData[type].disapproved; const unique = aggregatedData[type].uniqueStudents.size;
                       // const typeColor = examTypeBaseColors[type] || '#cccccc'; // No se usa para barras, solo tooltip si se quiere

                        const tooltipApproved = `<div style="padding:5px; border-left: 5px solid ${statusColors.approved};"><b>${type}</b><br>Aprobados: ${approved}</div>`;
                        const tooltipDisapproved = `<div style="padding:5px; border-left: 5px solid ${statusColors.disapproved};"><b>${type}</b><br>Reprobados: ${disapproved}</div>`;
                        const tooltipUnique = `<div style="padding:5px; border-left: 5px solid ${statusColors.unique};"><b>${type}</b><br>Estudiantes: ${unique}</div>`;

                        // Añadir fila al DataTable del GRÁFICO
                        chartDataTable.addRow([ type, approved, statusColors.approved, tooltipApproved, disapproved, statusColors.disapproved, tooltipDisapproved, unique, statusColors.unique, tooltipUnique ]);
                        // Añadir fila al DataTable de la TABLA
                        tableDataTable.addRow([type, approved, disapproved, unique]);
                    });

                    // Opciones Gráfico
                    const chartOptions = {
                        title: 'Resultados de Exámenes por Tipo y Estado', chartArea: { width: '80%', height: '80%' },
                        hAxis: { title: 'Tipo de Prueba', minValue: 0 }, vAxis: { title: 'Cantidad', minValue: 0, format: '#', gridlines: { color: '#e0e0e0' } },
                        legend: 'none', bar: { groupWidth: '75%' }, tooltip: { isHtml: true }
                    };

                    // Opciones Tabla
                     const tableOptions = {
                        showRowNumber: false, width: '100%', height: '100%',
                        cssClassNames: { tableRow: 'results-table-row', headerRow: 'results-table-header', oddTableRow: 'results-table-row-odd', selectedTableRow: 'results-table-row-selected', hoverTableRow: 'results-table-row-hover', headerCell: 'google-visualization-table-th', tableCell: 'google-visualization-table-td' },
                         allowHtml: true
                    };


                    if (chartDataTable.getNumberOfRows() > 0) {
                         chartInstance.draw(chartDataTable, chartOptions);
                         summaryTableInstance.draw(tableDataTable, tableOptions); // Dibujar tabla
                         document.getElementById('summary_table_container').style.display = 'block'; // Mostrar tabla
                    } else {
                         setMessage("No hay datos de exámenes para el filtro seleccionado.", false);
                         document.getElementById('summary_table_container').style.display = 'none'; // Ocultar tabla
                    }

                } catch(error) {
                    console.error("Error al aplicar filtros y dibujar:", error);
                    displayError(`Error al generar el reporte: ${error.message}. Revise la consola.`);
                }
            });
        }

        function printTable() {
            const tableContainer = document.getElementById('summary_table_container');
            if (tableContainer && tableContainer.style.display !== 'none') {
                tableContainer.classList.add('printable-area');
                window.print();
                setTimeout(() => { tableContainer.classList.remove('printable-area'); }, 500);
            } else { alert("No hay datos en la tabla para imprimir."); }
        }

        function setMessage(message, isError) { if (chartDiv) { chartDiv.innerHTML = `<p id="chart-message" style="text-align:center; color:${isError ? '#d32f2f' : 'grey'}; padding: 50px 0; display: block;">${message}</p>`; } }
        function displayError(message) { const errorDiv = document.getElementById('error-message'); if (errorDiv) { errorDiv.textContent = message; errorDiv.style.display = 'block'; } setMessage("Error al generar el gráfico.", true); }
        function clearError() { const errorDiv = document.getElementById('error-message'); if (errorDiv) errorDiv.style.display = 'none'; const chartMsg = document.getElementById('chart-message'); if(chartMsg) chartMsg.style.display = 'none'; }

    </script>

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

<div class="col-lg-12">
    <h1>Reporte Agregado de Exámenes por Estado</h1>

    <div class="filter-container">
         <div class="filter-group"> <label for="filterYear">Año:</label> <select id="filterYear"><option value="all">Todos</option></select> </div>
         <div class="filter-group"> <label for="filterSemester">Semestre:</label> <select id="filterSemester"><option value="all">Todos</option></select> </div>
         <div class="filter-group"> <label for="filterMonth">Mes:</label> <select id="filterMonth"><option value="all">Todos</option></select> </div>
         <div class="filter-group"> <label for="filterDay">Día:</label> <select id="filterDay"><option value="all">Todos</option></select> </div>
    </div>

    <div class="button-container">
        <button id="generateReportBtn" class="report-btn">Generar Reporte</button>
    </div>

     <div id="loading-message">Cargando datos iniciales...</div>
     <div id="error-message"></div>

    <div id="exam_count_chart_div" class="chart-container">
         <p id="chart-message" style="display: none;"></p>
    </div>

    <!-- Leyenda Personalizada HTML (Actualizada por JS) -->
    <div id="customLegendDiv" class="custom-legend">
         <p style="color:grey; font-style: italic;">Cargando leyenda...</p>
    </div>

     <!-- Contenedor para la Tabla Resumen e Impresión -->
    <div id="summary_table_container" class="table-summary-container printable-area">
        <div class="print-button-container">
             <button id="printTableBtn" class="print-btn">Imprimir Tabla</button>
        </div>
        <div id="summary_table_div" class="summary-table"></div>
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
