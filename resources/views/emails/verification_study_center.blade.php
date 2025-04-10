
<!DOCTYPE html>
<html>
<head>
    <title>Verificación de Correo</title>
</head>
<body>
    <h4>Hola {{ $user->name }}</h4>
    Usted ha solicitado registrarse en la plataforma <a href="https://plataforma.fundacionmagistral.org/"> plataforma.fundacionmagistral.org/</a>, como un Centro de Estudio. Por favor verifica tu correo haciendo clic en el siguiente enlace:</p>
    <p>Nombre: {{$studyCenter->name}}</p>
    <a href="{{ $url }}">Verificar mi cuenta</a>

    <h6>Código de Verificación: {{ $verificationCode }}</h6>
    <p>Si no te registraste, ignora este correo.</p>
</body>
</html>
