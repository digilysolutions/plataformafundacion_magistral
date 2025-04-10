<!DOCTYPE html>
<html>
<head>
    <title>Registro Exitoso: Centro de Estudio {{$studyCenter->name}}</title>
</head>
<body>
    <h4>¡Bienvenido, {{$studyCenter->name}}!</h4>

    <p>
        Nos complace informarte que tu registro como Centro de Estudio en nuestra plataforma
        <a href="https://plataforma.fundacionmagistral.org/">plataforma.fundacionmagistral.org</a> ha sido exitoso.
    </p>

    <p>
        A continuación, encontrarás la información necesaria para acceder a tu cuenta:
    </p>

    <p><strong>Usuario:</strong> {{$user->email}}</p>
    <p><strong>Contraseña:</strong> {{$password}}</p>
    <p><strong>Código de seguimiento:</strong> {{$studyCenter->id}}</p>
    <p>
        Por motivos de seguridad, te recomendamos que cambies tu contraseña después de iniciar sesión.
        Puedes hacerlo accediendo a tu perfil dentro de la plataforma.
    </p>

    <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en contactarnos.</p>

    <p>¡Gracias por ser parte de nuestra comunidad!</p>

    <p>Saludos cordiales,<br>
    El equipo de Fundación Magistral</p>
</body>
</html>
