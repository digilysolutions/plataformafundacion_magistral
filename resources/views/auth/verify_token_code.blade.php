<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Verifica tu Correo</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}  " />
    <link rel="stylesheet" href=" {{ asset('css/backend-plugin.min.css') }}  ">
    <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }}  ">
    <link rel="stylesheet" href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}  ">
    <link rel="stylesheet" href="{{ asset('vendor/remixicon/fonts/remixicon.css') }}  ">  </head>>

<body class=" ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="container">
                <div class="row align-items-center justify-content-center height-self-center">
                    <div class="col-lg-8">
                        <div class="card auth-card">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center auth-content">
                                    <div class="col-lg-7 align-self-center">
                                        <div class="p-3">

                                            <h2 class="mb-2">Verifica tu Correo</h2>
                                            <p>Ingresa el código de verificación:</p>
                                            <div id="messageContainer" class="mt-3"></div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input type="hidden" name="email"
                                                                value="{{ $user->email }}">
                                                            <input type="hidden" name="verification_token"
                                                                value="{{ $user->verification_token }}">

                                                            <label for="verification_code"></label>

                                                            <input class="floating-input form-control" type="text"
                                                                name="verification_code" id="verification_code" required
                                                                placeholder=" ">

                                                            <label>Código de verificación</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button id="verifyButton" type="submit" class="btn btn-primary">Verificar</button>

                                        </div>
                                    </div>
                                    <div class="col-lg-5 content-right">
                                        <img src="{{ asset('img/login/01.png') }}  " class="img-fluid image-right"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

     <!-- Backend Bundle JavaScript -->
     <script src="{{ asset('js/backend-bundle.min.js') }}  "></script>

     <!-- Table Treeview JavaScript -->
     <script src="{{ asset('js/table-treeview.js') }}  "></script>

     <!-- Chart Custom JavaScript -->
     <script src="{{ asset('js/customizer.js') }}  "></script>

     <!-- Chart Custom JavaScript -->
     <script async src="{{ asset('js/chart-custom.js') }}  "></script>

     <!-- app JavaScript -->
     <script src="{{ asset('js/app.js') }}  "></script>
     <script>
        $(document).ready(function() {
            $('#verifyButton').on('click', function() {

                let verificationCode = $('#verification_code').val();
                let email = $('input[name="email"]').val();
                let verificationToken = $('input[name="verification_token"]').val();

                $.ajax({
                    url: '/verify-code', // Asegúrate de que esta URL sea correcta
                    method: 'POST',
                    data: {
                        email: email,
                        verification_token: verificationToken,
                        verification_code: verificationCode,
                        _token: '{{ csrf_token() }}' // Incluyendo el token CSRF
                    },
                    success: function(response) {
                        $('#messageContainer').html('<div class="alert alert-success">Código verificado correctamente. Código de seguimiento: ' + response.person_id + '</div>');
                    },
                    error: function(xhr) {
                        let message = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Ocurrió un error al verificar el código.';
                    $('#messageContainer').html('<div class="alert alert-danger">' + message + '</div>');
                    }
                });
            });
        });
    </script>
</body>

</html>
