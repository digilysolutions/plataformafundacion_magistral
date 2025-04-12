<!DOCTYPE html>
<html>

<head>
    <title>Solicitud de código de seguuimiento</title>
</head>

<body>
    <h4>Hola {{ $user->name }}</h4>
    Usted ha solicitado el código de seguimiento en la <a href="https://plataforma.fundacionmagistral.org/">
        plataforma.fundacionmagistral.org/</a>, .Por favor verifica tu correo haciendo clic en el siguiente enlace:</p>
    <a href="{{ $url }}">Verificar mi cuenta</a>
    <p>Usa el código para verificar la cuenta:</p>
    <h6>Código de Verificación: {{ $verificationCode }}</h6>
    <p>Si no te registraste, ignora este correo.</p>
</body>

</html>
