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
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
        <h2>¿Qué son los ITEMS PISA?</h2>
        <p>
            Los ITEMS PISA son preguntas diseñadas para evaluar las habilidades de los estudiantes en diferentes áreas, como lectura, matemáticas y ciencias. La evaluación PISA, realizada por la Fundación, mide la capacidad de los estudiantes para aplicar sus conocimientos en situaciones de la vida real y resolver problemas complejos.
        </p>
        <p>
            La sección de ITEMS PISA Práctica permite a los estudiantes familiarizarse con el formato y tipo de preguntas que encontrarán en la evaluación real, sin que esto afecte su puntuación oficial. Es una excelente oportunidad para prepararse y entender cómo se estructura la prueba.
        </p>
        <p>
            La sección de ITEMS PISA Prueba es una simulación oficial que replica las condiciones reales del examen. Aquí, los estudiantes pueden practicar bajo un entorno similar al de la evaluación real, ayudándolos a aumentar su confianza y rendimiento.
        </p>
        <p>
            Ambas opciones son útiles para mejorar el entendimiento de los ITEMS PISA y prepararse mejor para la evaluación oficial, que mide la competencia en habilidades clave para el futuro académico y laboral.
        </p>
    </div>

@endsection
@section('js')
<script>
     itemsTimeUrl = "{{ route('test.items_time') }}";
     itemsPisaTest = "{{ route('pisa_test.test') }}";
    document.getElementById('btnPractica').addEventListener('click', () => {
        alert('Has seleccionado ITEMS PISA Práctica. Aquí podrás practicar con preguntas similares a las del examen real.');        
        window.location.href = itemsPisaTest;
    });  

    document.getElementById('btnPrueba').addEventListener('click', () => {
        alert('Has seleccionado ITEMS PISA Prueba. Aquí podrás realizar una simulación oficial del examen.');
        window.location.href = itemsTimeUrl;
    });
</script>
@endsection