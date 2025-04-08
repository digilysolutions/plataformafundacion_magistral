
<!DOCTYPE html>
<html>
<head>
    <title>Verificación de Correo</title>
</head>
<body>
    <h4>Hola {{ $user->name }}</h4>
    Uste ha sido registrado en la plataforma <a href="https://plataforma.fundacionmagistral.org/"> plataforma.fundacionmagistral.org/</a>, como Tutor del centro de estudio: {{$studyCenter->name}}. Por favor verifica tu correo haciendo clic en el siguiente enlace:</p>
    <a href="{{ $url }}">Verificar mi cuenta</a>
    <p>Usuario: {{$user->email}} </p>
    <p>Usa el código para verificar la cuenta:</p>
    <h6>Código de Verificación: {{ $verificationCode }}</h6>
    <p>Si no te registraste, ignora este correo.</p>
</body>
</html>
