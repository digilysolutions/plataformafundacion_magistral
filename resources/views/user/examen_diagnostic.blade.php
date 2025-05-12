@extends('layouts.app-admin')

@section('title-header-admin')
    Examen Diagnóstico
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
    <h1 style="text-align:center;">Examen Diagnóstico</h1>

    <div class="buttons-container">
        <button id="btnPractica">Examen Práctica</button>
        <button id="btnPrueba">Examen Prueba</button>
    </div>

    <div class="help-box">

        <p>
            Los exámenes de diagnóstico son herramientas de evaluación que se utilizan para identificar los puntos fuertes y
            débiles en los estudiantes, así como sus conocimientos previos y necesidades de aprendizaje. A diferencia de las
            evaluaciones sumativas o formativas, los exámenes de diagnóstico no tienen como objetivo calificar, sino más
            bien proporcionarte información para adaptar la enseñanza a tus necesidades individuales. Resolver ITEMS en esta
            modalidad te ayudará a prepararte para enfrentar exámenes de este tipo.
        </p>

    </div>
@endsection
@section('js')
    <script>
        itemsTimeUrl = "{{ route('examens.examen_time_diagnostic') }}";
        itemsPisaTest = "{{ route('examens.examen_practic_diagnostic') }}";
        document.getElementById('btnPractica').addEventListener('click', () => {            
            window.location.href = itemsPisaTest;
        });

        document.getElementById('btnPrueba').addEventListener('click', () => {           
            window.location.href = itemsTimeUrl;
        });
    </script>
@endsection
