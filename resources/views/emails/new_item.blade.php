<!DOCTYPE html>
<html>
<head>
    <title>Nueva Pregunta: {{$question->question}}</title>
</head>
<body>
    <h4>¡Hola {{$validator->name}}!</h4>

    <p>
        Te informamos que ha llegado un nuevo ITEM para su revisión en nuestra plataforma
        <a href="https://plataforma.fundacionmagistral.org/">plataforma.fundacionmagistral.org</a>.
    </p>

    <p><strong>Pregunta:</strong> {{$question->question}}</p>
    <p><strong>Nivel:</strong> {{$question->level->name}}</p>
    <p><strong>Especialidad:</strong> {{$question->specialty->name}}</p>
    <p><strong>Estado:</strong> {{$question->state}}</p>
    <h3>Respuestas:</h3>
    <ul>
        @foreach ($question->answers as $answer)
            <li>{{ $answer->answer }} @if ($answer->is_correct)
                    (Correcto)
                @endif
            </li>
        @endforeach
    </ul>

    <p>
        Por favor, revisa la pregunta y actúa según sea necesario. Recuerda que su estado actual es "{{$question->state}}".
    </p>

    <p>Si necesitas más información o tienes alguna pregunta, no dudes en contactarnos.</p>

    <p>¡Gracias por tu dedicación y compromiso!</p>

    <p>Saludos cordiales,<br>
    El equipo de Fundación Magistral</p>
</body>
</html>
