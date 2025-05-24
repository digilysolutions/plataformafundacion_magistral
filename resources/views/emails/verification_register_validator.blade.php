
<!DOCTYPE html>
<html>
<head>
    <title>Verificación de Correo</title>
</head>
<body>
    <h4>Hola {{ $user->name }}</h4>
    Uste ha solicitado registro como Validador en la plataforma <a href="https://plataforma.fundacionmagistral.org/"> plataforma.fundacionmagistral.org/</a>. Por favor verifica tu correo haciendo clic en el siguiente enlace:</p>
    <a href="{{ $url }}">Verificar mi cuenta</a>
    <p>Usa el código para verificar la cuenta:</p>
    <h6>Código de Verificación: {{ $verificationCode }}</h6>
    <p>Si no ha solicitado registro, ignora este correo.</p>
</body>
</html>
