<!DOCTYPE html>
<html>

<head>
    <title>Solicitud de Registro: Centro de Estudio</title>
</head>

<body>
    <h4>Solicitud de Registro de Centro de Estudio</h4>
    <p>Estimado equipo,</p>

    <p>El Centro de Estudio <strong>{{ $studyCenter->name }}</strong> ha solicitado registrarse en nuestra plataforma <a
            href="https://plataforma.fundacionmagistral.org/">plataforma.fundacionmagistral.org</a>.</p>

    <p><strong>Detalles del Centro de Estudio:</strong></p>
    <ul>
        <li><strong>Nombre:</strong> {{ $studyCenter->name }}</li>
        <li><strong>Correo Electrónico:</strong> {{ $studyCenter->mail }}</li>
    </ul>

    <p>Envíe el formulario con la información necesaria para el registro del centro en la plataforma.</p>

    <p>¡Gracias!</p>

    <p>Saludos cordiales,<br>
        El equipo de Fundación Magistral</p>
</body>

</html>
