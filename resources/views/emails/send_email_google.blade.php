<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso en la Plataforma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            padding: 20px;
        }
        h4 {
            color: #007BFF;
        }
        .content {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="content">
        <h4>Hola, {{ $person->name }}!</h4>
        <p>Nos complace informarte que has sido registrado exitosamente en nuestra plataforma <a href="https://plataforma.fundacionmagistral.org/">Fundación Magistral</a> utilizando tu cuenta de Google.</p>
        
        <p>Tu contraseña ha sido generada automáticamente y puedes utilizarla para iniciar sesión en caso de no acceder con Google:</p>
        <p><strong>Contraseña:</strong> {{ $password }}</p>   
        
        <h6>Tu Código de Seguimiento:</h6>
        <p>{{ $person->code }}</p>
        
        <p>Para cualquier consulta o asistencia, no dudes en contactarnos. ¡Estamos aquí para ayudarte!</p>
        
        <p>¡Gracias por unirte a nosotros!</p>
    </div>
</body>
</html>