<!DOCTYPE html>
<html>
<head>
    <title>Verifica tu Correo</title>
</head>
<body>
    <h1>Verifica tu Correo</h1>

    <form action="{{ route('verifyEmail', $user->verification_token) }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $user->email }}">
        <input type="hidden" name="verification_token" value="{{ $user->verification_token }}">

        <label for="verification_code">Ingresa el código de verificación:</label>
        <input type="text" name="verification_code" id="verification_code" required>

        <button type="submit">Verificar</button>
    </form>
</body>
</html>
