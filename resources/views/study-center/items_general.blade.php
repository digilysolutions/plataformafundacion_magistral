@extends('layouts.app-admin')

@section('title-header-admin')
    Items por Estudiante
@endsection
@section('css')
<style>
    /* --- Estilos CSS --- */

    h1 {
        color: #FF7E41 !important;
        text-align: center;
        margin-bottom: 30px;
    }

    h2.section-title { /* Títulos para Resumen, Resueltos, No Resueltos */
        color: #32BDEA !important;
        border-bottom: 2px solid #90caf9;
        padding-bottom: 10px;
        margin-top: 40px;
        margin-bottom: 20px;
    }

    .contenedor-fichas {
        display: flex;
        gap: 20px; /* Espacio entre fichas */
        flex-wrap: wrap; /* Permite que las fichas bajen de línea */
        margin-bottom: 30px;
    }

    .ficha {
        /* Ajuste para disposición 3x3 */
        flex: 0 0 calc(33.333% - 14px); /* No crecer, no encoger, base calculada (33.3% menos aprox 2/3 del gap) */
        min-width: 300px; /* Ancho mínimo antes de envolver */
        background-color: #e3f2fd;
        border: 1px solid #42a5f5;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 3px 3px 5px rgba(0, 0, 139, 0.1);
        margin-bottom: 20px; /* Espacio inferior consistente */
        display: flex;
        flex-direction: column;
    }
     /* Ancho completo para la ficha de resumen general */
    .ficha.general-summary {
         flex-basis: 100%; /* Ocupa todo el ancho */
         flex-grow: 1;
     }

    .ficha h2 { /* Títulos dentro de las fichas */
        margin-top: 0;
        color: #FF7E41 !important;
        border-bottom: 2px solid #90caf9;
        padding-bottom: 10px;
        margin-bottom: 15px;
        font-size: 1.2em;
        flex-shrink: 0;
    }
     .ficha h3 { /* Subtítulos en Resumen General y Leyenda */
         color: #FF7E41 !important; margin-top: 10px; margin-bottom: 8px;
         border-bottom: 1px dotted #90caf9; padding-bottom: 5px;
         font-size: 1.1em;
     }


    /* --- Estilo Ficha Resumen General --- */
    .ficha.general-summary ul { list-style: none; padding: 0; margin: 0 0 15px 0; }
    .ficha.general-summary li {
        background-color: #ffffff;
        border: 1px solid #bbdefb;
        border-left: 5px solid #32BDEA !important;
        padding: 8px 12px;
        margin-bottom: 8px;
        border-radius: 4px;
        font-size: 1.05em; /* Ligeramente más grande */
    }
    .ficha.general-summary li strong { color: #FF7E41 !important; float: right; }
    .ficha.general-summary .summary-columns { /* Para poner desgloses lado a lado */
         display: flex;
         gap: 30px;
         flex-wrap: wrap;
    }
     .ficha.general-summary .summary-column {
         flex: 1;
         min-width: 250px; /* Mínimo antes de apilar columnas */
     }
     .ficha.general-summary .summary-column li { /* Estilo normal para items de desglose */
          font-size: 1em;
     }


    /* --- Estilo listas Estudiante: Item --- */
    .ficha .student-item-list {
        list-style: none; padding: 0; margin: 0;
        max-height: 350px; overflow-y: auto;
        padding-right: 10px; flex-grow: 1;
    }
    .ficha .student-item-list li {
        background-color: #ffffff; border: 1px solid #bbdefb;
        padding: 7px 12px; margin-bottom: 6px; border-radius: 4px;
        color: #555; font-size: 0.95em; white-space: nowrap;
    }
    .ficha .student-item-list li .student-name {
        color: #32BDEA !important; font-weight: bold; margin-right: 5px;
    }
     .ficha .student-item-list li .item-code {
         font-family: monospace; color: #333;
     }

    /* --- Estilos Ficha Leyenda --- */
    .ficha.legend .legend-content {
        max-height: 350px; overflow-y: auto;
        padding-right: 10px; flex-grow: 1;
    }
     .ficha.legend .legend-content h4 {
        color: #32BDEA !important; margin-top: 10px; margin-bottom: 5px;
        font-size: 1em; font-weight: bold;
     }
    .ficha.legend .legend-content ul { list-style: disc; padding-left: 25px; margin: 0 0 15px 0; }
    .ficha.legend .legend-content li { margin-bottom: 5px; font-size: 0.95em; white-space: normal; }
    .ficha.legend .legend-content strong { color: #FF7E41 !important; font-family: monospace; margin-right: 5px; }

    /* Scrollbar (Webkit) */
    .student-item-list::-webkit-scrollbar,
    .legend-content::-webkit-scrollbar { width: 8px; }
    .student-item-list::-webkit-scrollbar-track,
    .legend-content::-webkit-scrollbar-track { background: #e3f2fd; border-radius: 4px; }
    .student-item-list::-webkit-scrollbar-thumb,
    .legend-content::-webkit-scrollbar-thumb { background-color: #90caf9; border-radius: 4px; border: 2px solid #e3f2fd; }
    .student-item-list::-webkit-scrollbar-thumb:hover,
    .legend-content::-webkit-scrollbar-thumb:hover { background-color: #42a5f5; }

</style>
@endsection
@section('content-admin')
<h1>Reporte de Items por Estudiante - Centro Educativo Divina Pastora</h1>

    <!-- =========================== -->
    <!-- === RESUMEN GENERAL ======= -->
    <!-- =========================== -->
    <h2 class="section-title">Resumen General del Centro</h2>
    <div class="contenedor-fichas">
        <div class="ficha general-summary"> <!-- Ficha única para el resumen -->
            <h2>Totales Generales</h2>
            <ul>
                <li>Total Items Resueltos: <strong>104</strong></li>
                <li>Total Items No Resueltos: <strong>57</strong></li>
            </ul>
            <div class="summary-columns"> <!-- Columnas para desgloses -->
                <div class="summary-column">
                    <h3>Desglose Resueltos:</h3>
                    <ul>
                       <li>Pruebas PISA: <strong>25</strong></li>
                       <li>Pruebas Nacionales: <strong>34</strong></li>
                       <li>Exámenes Diagnósticos: <strong>45</strong></li>
                    </ul>
                </div>
                <div class="summary-column">
                    <h3>Desglose No Resueltos:</h3>
                    <ul>
                        <li>Pruebas PISA: <strong>16</strong></li>
                        <li>Pruebas Nacionales: <strong>21</strong></li>
                        <li>Exámenes Diagnósticos: <strong>20</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- =========================== -->
    <!-- === ITEMS RESUELTOS ======= -->
    <!-- =========================== -->
    <h2 class="section-title">Items Resueltos (Detalle por Estudiante)</h2>
    <div class="contenedor-fichas">

        <!-- Resueltos PISA -->
        <div class="ficha">
            <h2>Items Resueltos - Pruebas PISA</h2>
            <ul class="student-item-list">
                 <!-- 25 entradas -->
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-EST-N3-001</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">ES-LEC-N2-002</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CN-INV-N4-003</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CS-SOC-N3-004</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-DAT-N2-005</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">ES-ARG-N4-006</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CN-EXP-N5-007</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CS-GLO-N3-008</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-PRO-N2-009</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">ES-INF-N3-010</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CN-MOD-N4-011</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CS-CUL-N2-012</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-ESP-N4-013</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">ES-EVA-N5-014</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CN-SIS-N3-015</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CS-DEM-N4-016</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">MA-CAM-N3-017</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">ES-PER-N2-018</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CN-ENE-N4-019</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CS-AMB-N5-020</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">MA-INC-N6-021</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">ES-COM-N3-022</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CN-VID-N2-023</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CS-INT-N4-024</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">MA-RAZ-N5-025</span></li>
            </ul>
        </div>

        <!-- Resueltos Nacionales -->
        <div class="ficha">
            <h2>Items Resueltos - Pruebas Nacionales (9no)</h2>
            <ul class="student-item-list">
                 <!-- 34 entradas -->
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CS-HIS-9NO-001</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">MA-ALG-9NO-002</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">ES-GRA-9NO-003</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CN-FIS-9NO-004</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CS-GEO-9NO-005</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">MA-GEM-9NO-006</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">ES-LIT-9NO-007</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CN-QUI-9NO-008</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CS-CIV-9NO-009</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">MA-EST-9NO-010</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">ES-ORT-9NO-011</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CN-BIO-9NO-012</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CS-HIS-9NO-013</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-ALG-9NO-014</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">ES-GRA-9NO-015</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CN-FIS-9NO-016</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CS-GEO-9NO-017</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">MA-GEM-9NO-018</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">ES-LIT-9NO-019</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CN-QUI-9NO-020</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CS-CIV-9NO-021</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">MA-EST-9NO-022</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">ES-ORT-9NO-023</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CN-BIO-9NO-024</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CS-HIS-9NO-025</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">MA-ALG-9NO-026</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">ES-GRA-9NO-027</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CN-FIS-9NO-028</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CS-GEO-9NO-029</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">MA-GEM-9NO-030</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">ES-LIT-9NO-031</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CN-QUI-9NO-032</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CS-CIV-9NO-033</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-EST-9NO-034</span></li>
            </ul>
        </div>

        <!-- Resueltos Diagnósticos -->
        <div class="ficha">
             <h2>Items Resueltos - Exámenes Diagnósticos (9no)</h2>
            <ul class="student-item-list">
                 <!-- 45 entradas -->
                 <li><span class="student-name">Carlos López:</span><span class="item-code">MA-ARI-9NO-001</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">ES-LEC-9NO-002</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CN-CEL-9NO-003</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CS-ECO-9NO-004</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">MA-NUM-9NO-005</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">ES-ESC-9NO-006</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CN-MAT-9NO-007</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CS-POL-9NO-008</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">MA-FRC-9NO-009</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">ES-VOC-9NO-010</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CN-ENE-9NO-011</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CS-DER-9NO-012</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">MA-MED-9NO-013</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">ES-SIN-9NO-014</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CN-SIS-9NO-015</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CS-SOC-9NO-016</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-PRO-9NO-017</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">ES-ANT-9NO-018</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CN-SAL-9NO-019</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CS-CUL-9NO-020</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">MA-POR-9NO-021</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">ES-PUN-9NO-022</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CN-GEN-9NO-023</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CS-MAP-9NO-024</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">MA-ALG-9NO-025</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">ES-CON-9NO-026</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CN-MOV-9NO-027</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CS-GOB-9NO-028</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">MA-GEO-9NO-029</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">ES-ORT-9NO-030</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CN-OND-9NO-031</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CS-CIU-9NO-032</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">MA-EST-9NO-033</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">ES-GRA-9NO-034</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CN-LUZ-9NO-035</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CS-HIS-9NO-036</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-FUN-9NO-037</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">ES-LIT-9NO-038</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CN-BIO-9NO-039</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CS-GEO-9NO-040</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">MA-TRI-9NO-041</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">ES-VER-9NO-042</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CN-FIS-9NO-043</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CS-CIV-9NO-044</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">MA-AZA-9NO-045</span></li>
            </ul>
        </div>
        <!-- Ficha Leyenda para Resueltos (Aparecerá aquí si la pantalla es ancha) -->
        <div class="ficha legend">
            <h2>Leyenda de Abreviaturas</h2>
            <div class="legend-content">
                 <h3>Especialidades (1er Código):</h3>
                 <ul><li><strong>CS</strong>: C. Sociales</li> <li><strong>MA</strong>: Matemáticas</li> <li><strong>ES</strong>: Español</li> <li><strong>CN</strong>: C. Naturales</li></ul>
                 <h3>Asignaturas (2do Código):</h3>
                 <h4>CS:</h4><ul><li><strong>AMB</strong>: Ambiental(PISA)</li><li><strong>CIV</strong>: Cívica</li><li><strong>CIU</strong>: Ciudadanía</li><li><strong>COM</strong>: Comunidad</li><li><strong>CUL</strong>: Cultural(PISA)/Culturas</li><li><strong>DEM</strong>: Democracia(PISA)</li><li><strong>DER</strong>: Derechos</li><li><strong>ECO</strong>: Economía</li><li><strong>FAM</strong>: Familia</li><li><strong>GEO</strong>: Geografía</li><li><strong>GLO</strong>: Globaliz.(PISA)</li><li><strong>GOB</strong>: Gobierno</li><li><strong>HIS</strong>: Historia</li><li><strong>INT</strong>: Interp. Fuentes(PISA)</li><li><strong>LOC</strong>: Localidad</li><li><strong>MAP</strong>: Mapas</li><li><strong>PAI</strong>: Paisajes</li><li><strong>POL</strong>: Política</li><li><strong>REG</strong>: Regiones</li><li><strong>SOC</strong>: Sist. Sociales(PISA)</li></ul>
                 <h4>MA:</h4><ul><li><strong>ALG</strong>: Álgebra</li><li><strong>ARI</strong>: Aritmética</li><li><strong>AZA</strong>: Azar</li><li><strong>CAM</strong>: Cambio(PISA)</li><li><strong>DAT</strong>: Datos(PISA)</li><li><strong>DIV</strong>: Divisiones</li><li><strong>ESP</strong>: Espacial(PISA)</li><li><strong>EST</strong>: Estadística</li><li><strong>FRA</strong>: Fracciones</li><li><strong>FUN</strong>: Funciones</li><li><strong>GEM</strong>: Geometría</li><li><strong>INC</strong>: Incertidumbre(PISA)</li><li><strong>MED</strong>: Medidas</li><li><strong>MUL</strong>: Multiplicación</li><li><strong>NUM</strong>: Numeración</li><li><strong>POR</strong>: Porcentajes</li><li><strong>PRO</strong>: Prob./Problemas</li><li><strong>RAZ</strong>: Razonamiento(PISA)</li><li><strong>RES</strong>: Restas</li><li><strong>SUM</strong>: Sumas</li><li><strong>TRI</strong>: Trigonometría</li></ul>
                 <h4>ES:</h4><ul><li><strong>ANT</strong>: Antónimos</li><li><strong>ARG</strong>: Argument.(PISA)</li><li><strong>COM</strong>: Comunic.(PISA)</li><li><strong>CON</strong>: Comp. Lectora</li><li><strong>ESC</strong>: Escritura</li><li><strong>EVA</strong>: Eval. Crítica(PISA)</li><li><strong>GRA</strong>: Gramática</li><li><strong>INF</strong>: Inferencia(PISA)</li><li><strong>LEC</strong>: Lectura</li><li><strong>LIT</strong>: Literatura</li><li><strong>ORT</strong>: Ortografía</li><li><strong>PER</strong>: Perspectiva(PISA)</li><li><strong>PUN</strong>: Puntuación</li><li><strong>SIN</strong>: Sinónimos</li><li><strong>VER</strong>: Verbos</li><li><strong>VOC</strong>: Vocabulario</li></ul>
                 <h4>CN:</h4><ul><li><strong>AGU</strong>: Agua</li><li><strong>ANI</strong>: Animales</li><li><strong>BIO</strong>: Biología</li><li><strong>CEL</strong>: Célula</li><li><strong>CUE</strong>: C. Humano</li><li><strong>ECO</strong>: Ecosistemas</li><li><strong>ENE</strong>: Energía</li><li><strong>EXP</strong>: Experimental(PISA)</li><li><strong>FIS</strong>: Física</li><li><strong>GEN</strong>: Genética</li><li><strong>INV</strong>: Invest.(PISA)</li><li><strong>LUZ</strong>: Luz</li><li><strong>MAT</strong>: Materia</li><li><strong>MOD</strong>: Modelado(PISA)</li><li><strong>MOV</strong>: Movimiento</li><li><strong>OND</strong>: Ondas</li><li><strong>PLA</strong>: Plantas</li><li><strong>QUI</strong>: Química</li><li><strong>SAL</strong>: Salud</li><li><strong>SER</strong>: Seres Vivos</li><li><strong>SIS</strong>: Sistemas(PISA/Cuerpo)</li><li><strong>VID</strong>: Sist. Vivos(PISA)</li></ul>
            </div>
        </div>

    </div> <!-- Fin contenedor fichas resueltas -->

    <!-- =========================== -->
    <!-- === ITEMS NO RESUELTOS ==== -->
    <!-- =========================== -->
    <h2 class="section-title">Items No Resueltos (Detalle por Estudiante)</h2>
    <div class="contenedor-fichas">

        <!-- No Resueltos PISA -->
        <div class="ficha">
            <h2>Items No Resueltos - Pruebas PISA</h2>
            <ul class="student-item-list">
                 <!-- 16 entradas -->
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">MA-RAZ-N1-015</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">ES-COM-N2-082</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CN-VID-N1-003</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CS-CUL-N2-119</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">MA-ESP-N3-045</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">ES-INF-N2-150</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CN-EXP-N3-028</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CS-SOC-N1-091</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">MA-DAT-N3-177</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">ES-PER-N2-006</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CN-MOD-N4-132</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CS-AMB-N3-064</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-CAM-N2-011</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">ES-ARG-N3-199</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CN-ENE-N2-073</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CS-GLO-N4-108</span></li>
            </ul>
        </div>

        <!-- No Resueltos Nacionales -->
        <div class="ficha">
            <h2>Items No Resueltos - Pruebas Nacionales (9no)</h2>
             <ul class="student-item-list">
                 <!-- 21 entradas -->
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-GEM-9NO-022</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">ES-LIT-9NO-147</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CN-QUI-9NO-009</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CS-CIV-9NO-078</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">MA-EST-9NO-161</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">ES-ORT-9NO-035</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CN-BIO-9NO-112</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CS-HIS-9NO-059</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">MA-ALG-9NO-180</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">ES-GRA-9NO-002</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CN-FIS-9NO-094</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">CS-GEO-9NO-128</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">MA-GEM-9NO-017</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">ES-LIT-9NO-071</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CN-QUI-9NO-155</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">CS-CIV-9NO-040</span></li>
                 <li><span class="student-name">Carlos López:</span><span class="item-code">MA-EST-9NO-103</span></li>
                 <li><span class="student-name">Sofía Martínez:</span><span class="item-code">ES-ORT-9NO-066</span></li>
                 <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CN-BIO-9NO-192</span></li>
                 <li><span class="student-name">Laura Fernández:</span><span class="item-code">CS-HIS-9NO-029</span></li>
                 <li><span class="student-name">Ana García:</span><span class="item-code">MA-ALG-9NO-088</span></li>
            </ul>
        </div>

        <!-- No Resueltos Diagnósticos -->
        <div class="ficha">
             <h2>Items No Resueltos - Exámenes Diagnósticos (9no)</h2>
            <ul class="student-item-list">
                <!-- 20 entradas -->
                <li><span class="student-name">Laura Fernández:</span><span class="item-code">CN-MAT-9NO-010</span></li>
                <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CS-POL-9NO-099</span></li>
                <li><span class="student-name">Sofía Martínez:</span><span class="item-code">MA-FRC-9NO-141</span></li>
                <li><span class="student-name">Carlos López:</span><span class="item-code">ES-VOC-9NO-005</span></li>
                <li><span class="student-name">Ana García:</span><span class="item-code">CN-ENE-9NO-067</span></li>
                <li><span class="student-name">Laura Fernández:</span><span class="item-code">CS-DER-9NO-173</span></li>
                <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">MA-MED-9NO-033</span></li>
                <li><span class="student-name">Sofía Martínez:</span><span class="item-code">ES-SIN-9NO-115</span></li>
                <li><span class="student-name">Carlos López:</span><span class="item-code">CN-SIS-9NO-050</span></li>
                <li><span class="student-name">Ana García:</span><span class="item-code">CS-SOC-9NO-188</span></li>
                <li><span class="student-name">Laura Fernández:</span><span class="item-code">MA-PRO-9NO-024</span></li>
                <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">ES-ANT-9NO-081</span></li>
                <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CN-SAL-9NO-127</span></li>
                <li><span class="student-name">Carlos López:</span><span class="item-code">CS-CUL-9NO-044</span></li>
                <li><span class="student-name">Ana García:</span><span class="item-code">MA-POR-9NO-169</span></li>
                <li><span class="student-name">Laura Fernández:</span><span class="item-code">ES-PUN-9NO-008</span></li>
                <li><span class="student-name">Javier Rodríguez:</span><span class="item-code">CN-GEN-9NO-075</span></li>
                <li><span class="student-name">Sofía Martínez:</span><span class="item-code">CS-MAP-9NO-136</span></li>
                <li><span class="student-name">Carlos López:</span><span class="item-code">MA-ALG-9NO-056</span></li>
                <li><span class="student-name">Ana García:</span><span class="item-code">ES-CON-9NO-195</span></li>
            </ul>
        </div>
        <!-- Ficha Leyenda para No Resueltos -->
         <div class="ficha legend">
            <h2>Leyenda de Abreviaturas</h2>
            <div class="legend-content">
                 <h3>Especialidades (1er Código):</h3>
                 <ul><li><strong>CS</strong>: C. Sociales</li> <li><strong>MA</strong>: Matemáticas</li> <li><strong>ES</strong>: Español</li> <li><strong>CN</strong>: C. Naturales</li></ul>
                 <h3>Asignaturas (2do Código):</h3>
                 <h4>CS:</h4><ul><li><strong>AMB</strong>: Ambiental(PISA)</li><li><strong>CIV</strong>: Cívica</li><li><strong>CIU</strong>: Ciudadanía</li><li><strong>COM</strong>: Comunidad</li><li><strong>CUL</strong>: Cultural(PISA)/Culturas</li><li><strong>DEM</strong>: Democracia(PISA)</li><li><strong>DER</strong>: Derechos</li><li><strong>ECO</strong>: Economía</li><li><strong>FAM</strong>: Familia</li><li><strong>GEO</strong>: Geografía</li><li><strong>GLO</strong>: Globaliz.(PISA)</li><li><strong>GOB</strong>: Gobierno</li><li><strong>HIS</strong>: Historia</li><li><strong>INT</strong>: Interp. Fuentes(PISA)</li><li><strong>LOC</strong>: Localidad</li><li><strong>MAP</strong>: Mapas</li><li><strong>PAI</strong>: Paisajes</li><li><strong>POL</strong>: Política</li><li><strong>REG</strong>: Regiones</li><li><strong>SOC</strong>: Sist. Sociales(PISA)</li></ul>
                 <h4>MA:</h4><ul><li><strong>ALG</strong>: Álgebra</li><li><strong>ARI</strong>: Aritmética</li><li><strong>AZA</strong>: Azar</li><li><strong>CAM</strong>: Cambio(PISA)</li><li><strong>DAT</strong>: Datos(PISA)</li><li><strong>DIV</strong>: Divisiones</li><li><strong>ESP</strong>: Espacial(PISA)</li><li><strong>EST</strong>: Estadística</li><li><strong>FRA</strong>: Fracciones</li><li><strong>FUN</strong>: Funciones</li><li><strong>GEM</strong>: Geometría</li><li><strong>INC</strong>: Incertidumbre(PISA)</li><li><strong>MED</strong>: Medidas</li><li><strong>MUL</strong>: Multiplicación</li><li><strong>NUM</strong>: Numeración</li><li><strong>POR</strong>: Porcentajes</li><li><strong>PRO</strong>: Prob./Problemas</li><li><strong>RAZ</strong>: Razonamiento(PISA)</li><li><strong>RES</strong>: Restas</li><li><strong>SUM</strong>: Sumas</li><li><strong>TRI</strong>: Trigonometría</li></ul>
                 <h4>ES:</h4><ul><li><strong>ANT</strong>: Antónimos</li><li><strong>ARG</strong>: Argument.(PISA)</li><li><strong>COM</strong>: Comunic.(PISA)</li><li><strong>CON</strong>: Comp. Lectora</li><li><strong>ESC</strong>: Escritura</li><li><strong>EVA</strong>: Eval. Crítica(PISA)</li><li><strong>GRA</strong>: Gramática</li><li><strong>INF</strong>: Inferencia(PISA)</li><li><strong>LEC</strong>: Lectura</li><li><strong>LIT</strong>: Literatura</li><li><strong>ORT</strong>: Ortografía</li><li><strong>PER</strong>: Perspectiva(PISA)</li><li><strong>PUN</strong>: Puntuación</li><li><strong>SIN</strong>: Sinónimos</li><li><strong>VER</strong>: Verbos</li><li><strong>VOC</strong>: Vocabulario</li></ul>
                 <h4>CN:</h4><ul><li><strong>AGU</strong>: Agua</li><li><strong>ANI</strong>: Animales</li><li><strong>BIO</strong>: Biología</li><li><strong>CEL</strong>: Célula</li><li><strong>CUE</strong>: C. Humano</li><li><strong>ECO</strong>: Ecosistemas</li><li><strong>ENE</strong>: Energía</li><li><strong>EXP</strong>: Experimental(PISA)</li><li><strong>FIS</strong>: Física</li><li><strong>GEN</strong>: Genética</li><li><strong>INV</strong>: Invest.(PISA)</li><li><strong>LUZ</strong>: Luz</li><li><strong>MAT</strong>: Materia</li><li><strong>MOD</strong>: Modelado(PISA)</li><li><strong>MOV</strong>: Movimiento</li><li><strong>OND</strong>: Ondas</li><li><strong>PLA</strong>: Plantas</li><li><strong>QUI</strong>: Química</li><li><strong>SAL</strong>: Salud</li><li><strong>SER</strong>: Seres Vivos</li><li><strong>SIS</strong>: Sistemas(PISA/Cuerpo)</li><li><strong>VID</strong>: Sist. Vivos(PISA)</li></ul>
            </div>
        </div>

    </div> <!-- Fin contenedor fichas no resueltas -->

@endsection
