@extends('layouts.app-admin')

@section('title-header-admin')
    Items
@endsection
@section('css')
    <style>
        /* --- Estilos CSS (Exactamente los mismos que en items_resueltos.html) --- */
        body {
            font-family: sans-serif;
            background-color: #f0f8ff;
            /* Azul muy claro */
            padding: 20px;
            color: #333;
        }

        h1 {
            color: #32BDEA;
            /* Azul oscuro */
            text-align: center;
            margin-bottom: 30px;
        }

        .contenedor-fichas {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .ficha {
            flex: 1;
            /* Todas las fichas intentan ocupar el mismo espacio */
            min-width: 280px;
            /* Ancho mínimo para todas */
            background-color: #e3f2fd;
            /* Azul claro */
            border: 1px solid #42a5f5;
            /* Azul medio */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 3px 3px 5px rgba(0, 0, 139, 0.1);
            /* Sombra azulada */
            margin-bottom: 20px;
            display: flex;
            /* Habilitar flex para el contenido interno */
            flex-direction: column;
            /* Apilar título y contenido */
        }

        .ficha h2 {
            /* Títulos dentro de las fichas */
            margin-top: 0;
            color: #32BDEA;
            border-bottom: 2px solid #90caf9;
            padding-bottom: 10px;
            margin-bottom: 15px;
            font-size: 1.2em;
            flex-shrink: 0;
            /* Evitar que el título se encoja */
        }

        /* --- Estilos para Fichas de Resumen (Summary) --- */
        .ficha.summary ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .ficha.summary li {
            background-color: #ffffff;
            border: 1px solid #bbdefb;
            border-left: 5px solid #FF7E41;
            padding: 8px 12px;
            margin-bottom: 8px;
            border-radius: 4px;
        }

        .ficha.summary li strong {
            color: #FF7E41;
            float: right;
        }

        /* --- Estilos para Fichas de Detalle (Detail) --- */
        .ficha.detail .detail-content {
            /* Contenedor interno para scroll */
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 300px;
            /* Altura máxima */
            overflow-y: auto;
            /* Scroll vertical */
            padding-right: 10px;
            /* Espacio para scrollbar */
            flex-grow: 1;
            /* Permitir que ocupe espacio vertical */
        }

        .ficha.detail .detail-content li {
            /* Estilo de los items de la lista */
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
        .ficha.legend .legend-content {
            /* Contenedor interno para scroll */
            max-height: 300px;
            /* Misma altura máxima que detail */
            overflow-y: auto;
            /* Scroll vertical */
            padding-right: 10px;
            /* Espacio para scrollbar */
            flex-grow: 1;
            /* Permitir que ocupe espacio vertical */
        }

        .ficha.legend .legend-content h3 {
            color: #FF7E41;
            margin-top: 0;
            margin-bottom: 8px;
            /* Ajustado margen superior */
            border-bottom: 1px dotted #90caf9;
            padding-bottom: 5px;
            font-size: 1.1em;
            /* Ligeramente más pequeño que h2 */
        }

        .ficha.legend .legend-content h4 {
            color: #FF7E41;
            margin-top: 10px;
            margin-bottom: 5px;
            font-size: 1em;
            font-weight: bold;
        }

        .ficha.legend .legend-content ul {
            list-style: disc;
            padding-left: 25px;
            margin: 0 0 15px 0;
        }

        .ficha.legend .legend-content li {
            margin-bottom: 5px;
            font-size: 0.95em;
        }

        .ficha.legend .legend-content strong {
            color: #32BDEA;
            font-family: monospace;
            margin-right: 5px;
        }

        /* Scrollbar (Webkit) - Aplicable a .detail-content y .legend-content */
        .detail-content::-webkit-scrollbar,
        .legend-content::-webkit-scrollbar {
            width: 8px;
        }

        .detail-content::-webkit-scrollbar-track,
        .legend-content::-webkit-scrollbar-track {
            background: #e3f2fd;
            border-radius: 4px;
        }

        .detail-content::-webkit-scrollbar-thumb,
        .legend-content::-webkit-scrollbar-thumb {
            background-color: #90caf9;
            border-radius: 4px;
            border: 2px solid #e3f2fd;
        }

        .detail-content::-webkit-scrollbar-thumb:hover,
        .legend-content::-webkit-scrollbar-thumb:hover {
            background-color: #42a5f5;
        }
    </style>
@endsection

@section('content-admin')
    <h1>Visualización de Items No Resueltos</h1>

    <div class="contenedor-fichas">

        <!-- Resumen No Resueltos -->
        <div class="ficha summary">
            <h2>Resumen Items No Resueltos</h2>
            <ul>
                <li>Pruebas PISA: <strong>16</strong></li>
                <li>Pruebas Nacionales: <strong>21</strong></li>
                <li>Exámenes diagnósticos: <strong>20</strong></li>
            </ul>
        </div>

        <!-- Detalle No Resueltos PISA -->
        <div class="ficha detail">
            <h2>Items No Resueltos - PISA (Nivel) (16)</h2>
            <ul class="detail-content"> <!-- Contenedor para scroll -->
                <li>MA-RAZ-N1-015</li>
                <li>ES-COM-N2-082</li>
                <li>CN-VID-N1-003</li>
                <li>CS-CUL-N2-119</li>
                <li>MA-ESP-N3-045</li>
                <li>ES-INF-N2-150</li>
                <li>CN-EXP-N3-028</li>
                <li>CS-SOC-N1-091</li>
                <li>MA-DAT-N3-177</li>
                <li>ES-PER-N2-006</li>
                <li>CN-MOD-N4-132</li>
                <li>CS-AMB-N3-064</li>
                <li>MA-CAM-N2-011</li>
                <li>ES-ARG-N3-199</li>
                <li>CN-ENE-N2-073</li>
                <li>CS-GLO-N4-108</li>
            </ul>
        </div>

        <!-- Detalle No Resueltos Nacionales -->
        <div class="ficha detail">
            <h2>Items No Resueltos - Nacionales (9no) (21)</h2>
            <ul class="detail-content"> <!-- Contenedor para scroll -->
                <li>MA-GEM-9NO-022</li>
                <li>ES-LIT-9NO-147</li>
                <li>CN-QUI-9NO-009</li>
                <li>CS-CIV-9NO-078</li>
                <li>MA-EST-9NO-161</li>
                <li>ES-ORT-9NO-035</li>
                <li>CN-BIO-9NO-112</li>
                <li>CS-HIS-9NO-059</li>
                <li>MA-ALG-9NO-180</li>
                <li>ES-GRA-9NO-002</li>
                <li>CN-FIS-9NO-094</li>
                <li>CS-GEO-9NO-128</li>
                <li>MA-GEM-9NO-017</li>
                <li>ES-LIT-9NO-071</li>
                <li>CN-QUI-9NO-155</li>
                <li>CS-CIV-9NO-040</li>
                <li>MA-EST-9NO-103</li>
                <li>ES-ORT-9NO-066</li>
                <li>CN-BIO-9NO-192</li>
                <li>CS-HIS-9NO-029</li>
                <li>MA-ALG-9NO-088</li>
            </ul>
        </div>

        <!-- Detalle No Resueltos Diagnósticos -->
        <div class="ficha detail">
            <h2>Items No Resueltos - Diagnósticos (9no) (20)</h2>
            <ul class="detail-content"> <!-- Contenedor para scroll -->
                <li>CN-MAT-9NO-010</li>
                <li>CS-POL-9NO-099</li>
                <li>MA-FRC-9NO-141</li>
                <li>ES-VOC-9NO-005</li>
                <li>CN-ENE-9NO-067</li>
                <li>CS-DER-9NO-173</li>
                <li>MA-MED-9NO-033</li>
                <li>ES-SIN-9NO-115</li>
                <li>CN-SIS-9NO-050</li>
                <li>CS-SOC-9NO-188</li>
                <li>MA-PRO-9NO-024</li>
                <li>ES-ANT-9NO-081</li>
                <li>CN-SAL-9NO-127</li>
                <li>CS-CUL-9NO-044</li>
                <li>MA-POR-9NO-169</li>
                <li>ES-PUN-9NO-008</li>
                <li>CN-GEN-9NO-075</li>
                <li>CS-MAP-9NO-136</li>
                <li>MA-ALG-9NO-056</li>
                <li>ES-CON-9NO-195</li>
            </ul>
        </div>

        <!-- Ficha de Leyenda (Ahora dentro del contenedor) -->
        <div class="ficha legend">
            <h2>Leyenda de Abreviaturas</h2>
            <div class="legend-content"> <!-- Contenedor para scroll -->
                <h3>Especialidades (1er Código):</h3>
                <ul>
                    <li><strong>CS</strong>: Ciencias Sociales</li>
                    <li><strong>MA</strong>: Matemáticas</li>
                    <li><strong>ES</strong>: Español</li>
                    <li><strong>CN</strong>: Ciencias Naturales</li>
                </ul>
                <h3>Asignaturas (2do Código):</h3>
                <h4>Ciencias Sociales (CS):</h4>
                <ul>
                    <li><strong>AMB</strong>: Temas Ambientales (PISA)</li>
                    <li><strong>CIV</strong>: Cívica</li>
                    <li><strong>CIU</strong>: Ciudadanía</li>
                    <li><strong>COM</strong>: Comunidad</li>
                    <li><strong>CUL</strong>: Cultural (PISA)/Culturas</li>
                    <li><strong>DEM</strong>: Procesos Democráticos (PISA)</li>
                    <li><strong>DER</strong>: Derechos</li>
                    <li><strong>ECO</strong>: Economía</li>
                    <li><strong>FAM</strong>: Familia</li>
                    <li><strong>GEO</strong>: Geografía</li>
                    <li><strong>GLO</strong>: Globalización (PISA)</li>
                    <li><strong>GOB</strong>: Gobierno</li>
                    <li><strong>HIS</strong>: Historia</li>
                    <li><strong>INT</strong>: Interpretación Fuentes (PISA)</li>
                    <li><strong>LOC</strong>: Localidad</li>
                    <li><strong>MAP</strong>: Mapas</li>
                    <li><strong>PAI</strong>: Paisajes</li>
                    <li><strong>POL</strong>: Política</li>
                    <li><strong>REG</strong>: Regiones</li>
                    <li><strong>SOC</strong>: Sistemas Sociales (PISA)</li>
                </ul>
                <h4>Matemáticas (MA):</h4>
                <ul>
                    <li><strong>ALG</strong>: Álgebra</li>
                    <li><strong>ARI</strong>: Aritmética</li>
                    <li><strong>AZA</strong>: Azar</li>
                    <li><strong>CAM</strong>: Cambio y Relaciones (PISA)</li>
                    <li><strong>DAT</strong>: Datos (PISA)</li>
                    <li><strong>DIV</strong>: Divisiones</li>
                    <li><strong>ESP</strong>: Espacial (PISA)</li>
                    <li><strong>EST</strong>: Estadística</li>
                    <li><strong>FRA</strong>: Fracciones</li>
                    <li><strong>FUN</strong>: Funciones</li>
                    <li><strong>GEM</strong>: Geometría</li>
                    <li><strong>INC</strong>: Incertidumbre (PISA)</li>
                    <li><strong>MED</strong>: Medidas</li>
                    <li><strong>MUL</strong>: Multiplicación</li>
                    <li><strong>NUM</strong>: Numeración</li>
                    <li><strong>POR</strong>: Porcentajes</li>
                    <li><strong>PRO</strong>: Probabilidad/Problemas</li>
                    <li><strong>RAZ</strong>: Razonamiento (PISA)</li>
                    <li><strong>RES</strong>: Restas</li>
                    <li><strong>SUM</strong>: Sumas</li>
                    <li><strong>TRI</strong>: Trigonometría</li>
                </ul>
                <h4>Español (ES):</h4>
                <ul>
                    <li><strong>ANT</strong>: Antónimos</li>
                    <li><strong>ARG</strong>: Argumentación (PISA)</li>
                    <li><strong>COM</strong>: Comunicación (PISA)</li>
                    <li><strong>CON</strong>: Comprensión Lectora</li>
                    <li><strong>ESC</strong>: Escritura</li>
                    <li><strong>EVA</strong>: Evaluación Crítica (PISA)</li>
                    <li><strong>GRA</strong>: Gramática</li>
                    <li><strong>INF</strong>: Inferencia (PISA)</li>
                    <li><strong>LEC</strong>: Lectura</li>
                    <li><strong>LIT</strong>: Literatura</li>
                    <li><strong>ORT</strong>: Ortografía</li>
                    <li><strong>PER</strong>: Perspectiva (PISA)</li>
                    <li><strong>PUN</strong>: Puntuación</li>
                    <li><strong>SIN</strong>: Sinónimos</li>
                    <li><strong>VER</strong>: Verbos</li>
                    <li><strong>VOC</strong>: Vocabulario</li>
                </ul>
                <h4>Ciencias Naturales (CN):</h4>
                <ul>
                    <li><strong>AGU</strong>: Agua</li>
                    <li><strong>ANI</strong>: Animales</li>
                    <li><strong>BIO</strong>: Biología</li>
                    <li><strong>CEL</strong>: Célula</li>
                    <li><strong>CUE</strong>: Cuerpo Humano</li>
                    <li><strong>ECO</strong>: Ecosistemas</li>
                    <li><strong>ENE</strong>: Energía</li>
                    <li><strong>EXP</strong>: Experimental (PISA)</li>
                    <li><strong>FIS</strong>: Física</li>
                    <li><strong>GEN</strong>: Genética</li>
                    <li><strong>INV</strong>: Investigación (PISA)</li>
                    <li><strong>LUZ</strong>: Luz</li>
                    <li><strong>MAT</strong>: Materia</li>
                    <li><strong>MOD</strong>: Modelado (PISA)</li>
                    <li><strong>MOV</strong>: Movimiento</li>
                    <li><strong>OND</strong>: Ondas</li>
                    <li><strong>PLA</strong>: Plantas</li>
                    <li><strong>QUI</strong>: Química</li>
                    <li><strong>SAL</strong>: Salud</li>
                    <li><strong>SER</strong>: Seres Vivos</li>
                    <li><strong>SIS</strong>: Sistemas (PISA/Cuerpo)</li>
                    <li><strong>VID</strong>: Sistemas Vivos (PISA)</li>
                </ul>
            </div>
        </div>

    </div>
@endsection
