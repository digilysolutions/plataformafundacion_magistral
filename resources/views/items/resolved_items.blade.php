@extends('layouts.app-admin')

@section('title-header-admin')
    Items
@endsection
@section('css')
<style>
    /* --- Estilos CSS (Comunes para ambas vistas) --- */
    body {
        font-family: sans-serif;
        background-color: #f0f8ff; /* Azul muy claro */
        padding: 20px;
        color: #333;
    }

    h1 {
        color: #32BDEA; /* Azul oscuro */
        text-align: center;
        margin-bottom: 30px;
    }

    /* Removido h2.section-title ya que la leyenda va dentro del contenedor principal */

    .contenedor-fichas {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 30px;
    }

    .ficha {
        flex: 1; /* Todas las fichas intentan ocupar el mismo espacio */
        min-width: 280px; /* Ancho mínimo para todas */
        background-color: #e3f2fd; /* Azul claro */
        border: 1px solid #42a5f5;  /* Azul medio */
        border-radius: 8px;
        padding: 20px;
        box-shadow: 3px 3px 5px rgba(0, 0, 139, 0.1); /* Sombra azulada */
        margin-bottom: 20px;
        display: flex; /* Habilitar flex para el contenido interno */
        flex-direction: column; /* Apilar título y contenido */
    }

    .ficha h2 { /* Títulos dentro de las fichas */
        margin-top: 0;
        color: #32BDEA;
        border-bottom: 2px solid #90caf9;
        padding-bottom: 10px;
        margin-bottom: 15px;
        font-size: 1.2em;
        flex-shrink: 0; /* Evitar que el título se encoja */
    }

    /* --- Estilos para Fichas de Resumen (Summary) --- */
    .ficha.summary ul { list-style: none; padding: 0; margin: 0; }
    .ficha.summary li {
        background-color: #ffffff;
        border: 1px solid #bbdefb;
        border-left: 5px solid #1976d2;
        padding: 8px 12px;
        margin-bottom: 8px;
        border-radius: 4px;
    }
    .ficha.summary li strong { color: #1565c0; float: right; }

    /* --- Estilos para Fichas de Detalle (Detail) --- */
    .ficha.detail .detail-content { /* Contenedor interno para scroll */
        list-style: none;
        padding: 0;
        margin: 0;
        max-height: 300px; /* Altura máxima */
        overflow-y: auto;  /* Scroll vertical */
        padding-right: 10px; /* Espacio para scrollbar */
        flex-grow: 1; /* Permitir que ocupe espacio vertical */
    }
    .ficha.detail .detail-content li { /* Estilo de los items de la lista */
        background-color: #ffffff;
        border: 1px solid #bbdefb;
        padding: 6px 10px;
        margin-bottom: 5px;
        border-radius: 4px;
        color: #555;
        font-size: 0.9em;
        font-family: monospace;
        white-space: nowrap;
    }

    /* --- Estilos para la Ficha de Leyenda --- */
    .ficha.legend .legend-content { /* Contenedor interno para scroll */
        max-height: 300px; /* Misma altura máxima que detail */
        overflow-y: auto;  /* Scroll vertical */
        padding-right: 10px; /* Espacio para scrollbar */
        flex-grow: 1; /* Permitir que ocupe espacio vertical */
    }
    .ficha.legend .legend-content h3 {
        color: #1565c0; margin-top: 0; margin-bottom: 8px; /* Ajustado margen superior */
        border-bottom: 1px dotted #90caf9; padding-bottom: 5px;
        font-size: 1.1em; /* Ligeramente más pequeño que h2 */
    }
     .ficha.legend .legend-content h4 {
        color: #1976d2; margin-top: 10px; margin-bottom: 5px;
        font-size: 1em; font-weight: bold;
     }
    .ficha.legend .legend-content ul { list-style: disc; padding-left: 25px; margin: 0 0 15px 0; }
    .ficha.legend .legend-content li { margin-bottom: 5px; font-size: 0.95em; }
    .ficha.legend .legend-content strong { color: #32BDEA; font-family: monospace; margin-right: 5px; }

    /* Scrollbar (Webkit) - Aplicable a .detail-content y .legend-content */
    .detail-content::-webkit-scrollbar,
    .legend-content::-webkit-scrollbar { width: 8px; }

    .detail-content::-webkit-scrollbar-track,
    .legend-content::-webkit-scrollbar-track { background: #e3f2fd; border-radius: 4px; }

    .detail-content::-webkit-scrollbar-thumb,
    .legend-content::-webkit-scrollbar-thumb { background-color: #90caf9; border-radius: 4px; border: 2px solid #e3f2fd; }

    .detail-content::-webkit-scrollbar-thumb:hover,
    .legend-content::-webkit-scrollbar-thumb:hover { background-color: #42a5f5; }
</style>
@endsection

@section('content-admin')
<h1>Visualización de Items Resueltos</h1>

<div class="contenedor-fichas">

    <!-- Resumen Resueltos -->
    <div class="ficha summary">
        <h2>Resumen Items Resueltos</h2>
        <ul>
            <li>Pruebas PISA: <strong>25</strong></li>
            <li>Pruebas Nacionales: <strong>34</strong></li>
            <li>Exámenes diagnósticos: <strong>45</strong></li>
        </ul>
    </div>

    <!-- Detalle Resueltos PISA -->
    <div class="ficha detail">
        <h2>Items Resueltos - PISA (Nivel) (25)</h2>
        <ul class="detail-content"> <!-- Contenedor para scroll -->
            <li>MA-EST-N3-001</li> <li>ES-LEC-N2-002</li> <li>CN-INV-N4-003</li>
            <li>CS-SOC-N3-004</li> <li>MA-DAT-N2-005</li> <li>ES-ARG-N4-006</li>
            <li>CN-EXP-N5-007</li> <li>CS-GLO-N3-008</li> <li>MA-PRO-N2-009</li>
            <li>ES-INF-N3-010</li> <li>CN-MOD-N4-011</li> <li>CS-CUL-N2-012</li>
            <li>MA-ESP-N4-013</li> <li>ES-EVA-N5-014</li> <li>CN-SIS-N3-015</li>
            <li>CS-DEM-N4-016</li> <li>MA-CAM-N3-017</li> <li>ES-PER-N2-018</li>
            <li>CN-ENE-N4-019</li> <li>CS-AMB-N5-020</li> <li>MA-INC-N6-021</li>
            <li>ES-COM-N3-022</li> <li>CN-VID-N2-023</li> <li>CS-INT-N4-024</li>
            <li>MA-RAZ-N5-025</li>
        </ul>
    </div>

    <!-- Detalle Resueltos Nacionales -->
    <div class="ficha detail">
        <h2>Items Resueltos - Nacionales (9no) (34)</h2>
        <ul class="detail-content"> <!-- Contenedor para scroll -->
            <li>CS-HIS-9NO-001</li> <li>MA-ALG-9NO-002</li> <li>ES-GRA-9NO-003</li>
            <li>CN-FIS-9NO-004</li> <li>CS-GEO-9NO-005</li> <li>MA-GEM-9NO-006</li>
            <li>ES-LIT-9NO-007</li> <li>CN-QUI-9NO-008</li> <li>CS-CIV-9NO-009</li>
            <li>MA-EST-9NO-010</li> <li>ES-ORT-9NO-011</li> <li>CN-BIO-9NO-012</li>
            <li>CS-HIS-9NO-013</li> <li>MA-ALG-9NO-014</li> <li>ES-GRA-9NO-015</li>
            <li>CN-FIS-9NO-016</li> <li>CS-GEO-9NO-017</li> <li>MA-GEM-9NO-018</li>
            <li>ES-LIT-9NO-019</li> <li>CN-QUI-9NO-020</li> <li>CS-CIV-9NO-021</li>
            <li>MA-EST-9NO-022</li> <li>ES-ORT-9NO-023</li> <li>CN-BIO-9NO-024</li>
            <li>CS-HIS-9NO-025</li> <li>MA-ALG-9NO-026</li> <li>ES-GRA-9NO-027</li>
            <li>CN-FIS-9NO-028</li> <li>CS-GEO-9NO-029</li> <li>MA-GEM-9NO-030</li>
            <li>ES-LIT-9NO-031</li> <li>CN-QUI-9NO-032</li> <li>CS-CIV-9NO-033</li>
            <li>MA-EST-9NO-034</li>
        </ul>
    </div>

    <!-- Detalle Resueltos Diagnósticos -->
    <div class="ficha detail">
         <h2>Items Resueltos - Diagnósticos (9no) (45)</h2>
        <ul class="detail-content"> <!-- Contenedor para scroll -->
            <li>MA-ARI-9NO-001</li> <li>ES-LEC-9NO-002</li> <li>CN-CEL-9NO-003</li>
            <li>CS-ECO-9NO-004</li> <li>MA-NUM-9NO-005</li> <li>ES-ESC-9NO-006</li>
            <li>CN-MAT-9NO-007</li> <li>CS-POL-9NO-008</li> <li>MA-FRC-9NO-009</li>
            <li>ES-VOC-9NO-010</li> <li>CN-ENE-9NO-011</li> <li>CS-DER-9NO-012</li>
            <li>MA-MED-9NO-013</li> <li>ES-SIN-9NO-014</li> <li>CN-SIS-9NO-015</li>
            <li>CS-SOC-9NO-016</li> <li>MA-PRO-9NO-017</li> <li>ES-ANT-9NO-018</li>
            <li>CN-SAL-9NO-019</li> <li>CS-CUL-9NO-020</li> <li>MA-POR-9NO-021</li>
            <li>ES-PUN-9NO-022</li> <li>CN-GEN-9NO-023</li> <li>CS-MAP-9NO-024</li>
            <li>MA-ALG-9NO-025</li> <li>ES-CON-9NO-026</li> <li>CN-MOV-9NO-027</li>
            <li>CS-GOB-9NO-028</li> <li>MA-GEO-9NO-029</li> <li>ES-ORT-9NO-030</li>
            <li>CN-OND-9NO-031</li> <li>CS-CIU-9NO-032</li> <li>MA-EST-9NO-033</li>
            <li>ES-GRA-9NO-034</li> <li>CN-LUZ-9NO-035</li> <li>CS-HIS-9NO-036</li>
            <li>MA-FUN-9NO-037</li> <li>ES-LIT-9NO-038</li> <li>CN-BIO-9NO-039</li>
            <li>CS-GEO-9NO-040</li> <li>MA-TRI-9NO-041</li> <li>ES-VER-9NO-042</li>
            <li>CN-FIS-9NO-043</li> <li>CS-CIV-9NO-044</li> <li>MA-AZA-9NO-045</li>
        </ul>
    </div>

    <!-- Ficha de Leyenda (Ahora dentro del contenedor) -->
    <div class="ficha legend">
        <h2>Leyenda de Abreviaturas</h2>
        <div class="legend-content"> <!-- Contenedor para scroll -->
             <h3>Especialidades (1er Código):</h3>
             <ul>
                 <li><strong>CS</strong>: Ciencias Sociales</li> <li><strong>MA</strong>: Matemáticas</li>
                 <li><strong>ES</strong>: Español</li> <li><strong>CN</strong>: Ciencias Naturales</li>
             </ul>
             <h3>Asignaturas (2do Código):</h3>
             <h4>Ciencias Sociales (CS):</h4>
             <ul>
                <li><strong>AMB</strong>: Temas Ambientales (PISA)</li><li><strong>CIV</strong>: Cívica</li><li><strong>CIU</strong>: Ciudadanía</li>
                <li><strong>COM</strong>: Comunidad</li><li><strong>CUL</strong>: Cultural (PISA)/Culturas</li><li><strong>DEM</strong>: Procesos Democráticos (PISA)</li>
                <li><strong>DER</strong>: Derechos</li><li><strong>ECO</strong>: Economía</li><li><strong>FAM</strong>: Familia</li><li><strong>GEO</strong>: Geografía</li>
                <li><strong>GLO</strong>: Globalización (PISA)</li><li><strong>GOB</strong>: Gobierno</li><li><strong>HIS</strong>: Historia</li>
                <li><strong>INT</strong>: Interpretación Fuentes (PISA)</li><li><strong>LOC</strong>: Localidad</li><li><strong>MAP</strong>: Mapas</li>
                <li><strong>PAI</strong>: Paisajes</li><li><strong>POL</strong>: Política</li><li><strong>REG</strong>: Regiones</li><li><strong>SOC</strong>: Sistemas Sociales (PISA)</li>
             </ul>
             <h4>Matemáticas (MA):</h4>
             <ul>
                <li><strong>ALG</strong>: Álgebra</li><li><strong>ARI</strong>: Aritmética</li><li><strong>AZA</strong>: Azar</li>
                <li><strong>CAM</strong>: Cambio y Relaciones (PISA)</li><li><strong>DAT</strong>: Datos (PISA)</li><li><strong>DIV</strong>: Divisiones</li>
                <li><strong>ESP</strong>: Espacial (PISA)</li><li><strong>EST</strong>: Estadística</li><li><strong>FRA</strong>: Fracciones</li>
                <li><strong>FUN</strong>: Funciones</li><li><strong>GEM</strong>: Geometría</li><li><strong>INC</strong>: Incertidumbre (PISA)</li>
                <li><strong>MED</strong>: Medidas</li><li><strong>MUL</strong>: Multiplicación</li><li><strong>NUM</strong>: Numeración</li>
                <li><strong>POR</strong>: Porcentajes</li><li><strong>PRO</strong>: Probabilidad/Problemas</li><li><strong>RAZ</strong>: Razonamiento (PISA)</li>
                <li><strong>RES</strong>: Restas</li><li><strong>SUM</strong>: Sumas</li><li><strong>TRI</strong>: Trigonometría</li>
             </ul>
             <h4>Español (ES):</h4>
             <ul>
                <li><strong>ANT</strong>: Antónimos</li><li><strong>ARG</strong>: Argumentación (PISA)</li><li><strong>COM</strong>: Comunicación (PISA)</li>
                <li><strong>CON</strong>: Comprensión Lectora</li><li><strong>ESC</strong>: Escritura</li><li><strong>EVA</strong>: Evaluación Crítica (PISA)</li>
                <li><strong>GRA</strong>: Gramática</li><li><strong>INF</strong>: Inferencia (PISA)</li><li><strong>LEC</strong>: Lectura</li><li><strong>LIT</strong>: Literatura</li>
                <li><strong>ORT</strong>: Ortografía</li><li><strong>PER</strong>: Perspectiva (PISA)</li><li><strong>PUN</strong>: Puntuación</li>
                <li><strong>SIN</strong>: Sinónimos</li><li><strong>VER</strong>: Verbos</li><li><strong>VOC</strong>: Vocabulario</li>
             </ul>
             <h4>Ciencias Naturales (CN):</h4>
             <ul>
                <li><strong>AGU</strong>: Agua</li><li><strong>ANI</strong>: Animales</li><li><strong>BIO</strong>: Biología</li><li><strong>CEL</strong>: Célula</li>
                <li><strong>CUE</strong>: Cuerpo Humano</li><li><strong>ECO</strong>: Ecosistemas</li><li><strong>ENE</strong>: Energía</li>
                <li><strong>EXP</strong>: Experimental (PISA)</li><li><strong>FIS</strong>: Física</li><li><strong>GEN</strong>: Genética</li>
                <li><strong>INV</strong>: Investigación (PISA)</li><li><strong>LUZ</strong>: Luz</li><li><strong>MAT</strong>: Materia</li>
                <li><strong>MOD</strong>: Modelado (PISA)</li><li><strong>MOV</strong>: Movimiento</li><li><strong>OND</strong>: Ondas</li>
                <li><strong>PLA</strong>: Plantas</li><li><strong>QUI</strong>: Química</li><li><strong>SAL</strong>: Salud</li>
                <li><strong>SER</strong>: Seres Vivos</li><li><strong>SIS</strong>: Sistemas (PISA/Cuerpo)</li><li><strong>VID</strong>: Sistemas Vivos (PISA)</li>
             </ul>
        </div>
    </div>

</div>
@endsection
