@extends('layouts.app-admin')

@section('title-header-admin')
    Items
@endsection
@section('css')
    <style>
        .buttons-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 30px;
        }

        button {
            padding: 15px 25px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .help-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .help-box h2 {
            margin-top: 0;
            color: #333;
        }

        .help-box p {
            line-height: 1.6;
            color: #555;
        }
    </style>
@endsection

@section('content-admin')
    <h1 style="text-align:center;">ITEMS PISA</h1>

    <div class="buttons-container">
        <button id="btnPractica">ITEMS PISA Práctica</button>
        <button id="btnPrueba">ITEMS PISA Prueba</button>
    </div>

    <div class="help-box">

        <p>
            Los ítems PISA son preguntas o tareas diseñadas para evaluar lo que los estudiantes de 15 años saben y pueden
            hacer en áreas clave como ciencias, matemáticas y lectura. Estas preguntas no solo miden conocimientos teóricos,
            sino también la capacidad de aplicar lo aprendido a situaciones de la vida real.
        </p>
        <h2>¿Qué evalúan los ítems PISA?</h2>
        <p>
            Contextos: Los ítems se presentan en situaciones que pueden ser personales, locales, nacionales o globales. Por
            ejemplo, pueden tratar sobre temas de salud, medio ambiente, recursos naturales o avances tecnológicos. Así,
            buscan que los estudiantes como tú relacionen la ciencia con problemas actuales y cotidianos.

        </p>
        <p>
            Conocimientos: Evalúan si entiendes los conceptos y teorías principales de la ciencia, cómo se produce el
            conocimiento científico y por qué se usan ciertos métodos. Esto incluye saber sobre el mundo natural y cómo
            funciona la tecnología.

        </p>
        <p>
            Competencias: Más allá de memorizar, los ítems PISA buscan saber si puedes:
        </p>
        <ul>
            <li>
                Explicar fenómenos científicos usando tus conocimientos.
            </li>
            <li>
                Proponer y evaluar experimentos o investigaciones.
            </li>
            <li>
                Interpretar datos y sacar conclusiones a partir de gráficos, tablas o textos científicos
            </li>
            <li>
                Tomar decisiones informadas sobre temas científicos que afectan a la sociedad.

            </li>
            <li>

            </li>
        </ul>
        <p>
            Identidad científica: También consideran tu actitud hacia la ciencia, tu interés y si valoras su importancia
            para la vida diaria y el cuidado del medio ambiente
        </p>
    </div>
@endsection
@section('js')
    <script>
        itemsTimeUrl = "{{ route('test.items_time') }}";
        itemsPisaTest = "{{ route('pisa_test.test') }}";
        document.getElementById('btnPractica').addEventListener('click', () => {
            alert(
                'Has seleccionado ITEMS PISA Práctica. Aquí podrás practicar con preguntas similares a las del examen real.');
            window.location.href = itemsPisaTest;
        });

        document.getElementById('btnPrueba').addEventListener('click', () => {
            alert('Has seleccionado ITEMS PISA Prueba. Aquí podrás realizar una simulación oficial del examen.');
            window.location.href = itemsTimeUrl;
        });
    </script>
@endsection
