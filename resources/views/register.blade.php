<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fundación Magistral | Registrarse</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/icono/fm-plataforma.jpg') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend-plugin.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
    <style>
        .separador {
            border: none;
            /* Eliminar el borde predeterminado */
            height: 2px;
            /* Altura de la línea */
            background-color: rgb(228, 228, 228);
            /* Color de la línea */
            margin-top: 20px;
            margin-bottom: 40px;
            /* Espacio arriba y abajo de la línea */
        }

        .divider {
            position: relative;
            margin: 20px 0;
            text-align: center;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 80%;
            height: 1px;
            background: #ccc;
            z-index: 0;
        }

        .divider::before {
            right: 10%;
            margin-right: 10px;
        }

        .divider::after {
            left: 2%;
            margin-left: 10px;
        }

        .divider span {
            position: relative;
            z-index: 1;
            background: #fff;
            /* Color de fondo para ocultar la línea */
            padding: 0 5px;
            /* Espaciado alrededor del texto */
        }

        .register-prompt {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

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
                                            <h2 class="mb-2">Registrarse</h2>

                                            <a href="{{ route('login.google') }}"
                                                class="d-flex align-items-center mb-2 card-total-sale text-center">
                                                <div class="icon ">
                                                    <img src="{{ asset('img/google.png') }}" class="img-fluid"
                                                        alt="image">
                                                </div>
                                                <h3 class="mt-2 ml-2">Google</h3>
                                            </a>
                                           
                                                <div class="divider">
                                                    <span>o</span>
                                                </div>
                                            
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input name="name"
                                                                class="floating-input form-control @error('name') is-invalid @enderror"
                                                                type="text" placeholder=" "
                                                                value="{{ old('name') }}" required autofocus
                                                                autocomplete="name">
                                                            <label>Nombre *</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input name="lastname"
                                                                class="floating-input form-control @error('lastname') is-invalid @enderror"
                                                                type="text" placeholder=" " required>
                                                            <label>Apellidos *</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input name="email"
                                                                class="floating-input form-control @error('email') is-invalid @enderror"
                                                                type="email" placeholder=" " required>
                                                            <label>Correo *</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input name="phone"
                                                                class="floating-input form-control @error('phone') is-invalid @enderror"
                                                                type="text" placeholder=" ">
                                                            <label>Teléfono</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input name="password"
                                                                class="floating-input form-control @error('password') is-invalid @enderror"
                                                                type="password" placeholder=" " required>
                                                            <label>Contraseña *</label>
                                                            <div class="help-block with-errors"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input name="password_confirmation"
                                                                class="floating-input form-control @error('password_confirmation') is-invalid @enderror"
                                                                type="password" placeholder=" " required>
                                                            <label>Confirmar Contraseña *</label>
                                                            <div class="help-block with-errors"></div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Registrarse</button>
                                                <p class="mt-3">
                                                    ¿Ya tienes una cuenta?" <a href="{{ route('login') }}"
                                                        class="text-primary">Iniciar sesión</a>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 content-right">
                                        <img src="{{ asset('img/login/01.png') }}" class="img-fluid image-right"
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
    <script src=" {{ asset('js/backend-bundle.min.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('js/table-treeview.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('js/customizer.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('js/chart-custom.js') }}"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
