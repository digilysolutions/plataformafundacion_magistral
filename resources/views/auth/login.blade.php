<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fundación Magistral | login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/icono/fm-plataforma.jpg') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/remixicon.css') }}">
   
</head>

<body>

    <div class="wrapper">
        <section class="login-content">
            <div class="container">
                <div class="row align-items-center justify-content-center height-self-center">

                    <div class="col-lg-7 ">
                        <div class="card auth-card text-center">
                            @if (session('status'))
                                <div class="alert alert-success mt-2">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))

                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('errors'))

                                <div class="alert alert-danger">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            @endif
                            @if ($errors->has('error'))

                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('error') }} <!-- Cambia "email" por el campo correcto -->
                                </div>
                            @endif



                            <div class="card-body p-0">
                                <div class="d-flex align-items-center auth-content">
                                    <div class="col-lg-7 align-self-center">

                                        <div class="p-3">
                                            <h2 class="mb-5">Iniciar Sesión</h2>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="email"
                                                                name="email" placeholder=" " required autofocus
                                                                autocomplete="username" />
                                                            <label>Correo</label>
                                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" id="password"
                                                                name="password" type="password" placeholder=" " required
                                                                autocomplete="current-password" />
                                                            <label>Contraseña</label>


                                                            <!-- Ojo para mostrar/ocultar contraseña -->
                                                            <span toggle="#password" class="toggle-password"
                                                                style="cursor: pointer; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                                                                <!-- Ojo Cerrado por defecto -->
                                                                <svg class="svg-icon eye-icon" width="20"
                                                                    height="20" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path
                                                                        d="M1 12c0 0 3.1 7 11 7s11-7 11-7-3.1-7-11-7-11 7-11 7z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                    <line x1="1" y1="1" x2="23"
                                                                        y2="23" stroke="currentColor"
                                                                        stroke-width="2"></line>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control"
                                                                name="codigo_seguimiento" type="text" placeholder=" "
                                                                required />
                                                            <label>Código</label>
                                                            <x-input-error :messages="$errors->get('codigo_seguimiento')" class="mt-2" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="custom-control custom-checkbox mb-3 float-left">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="remember" id="customCheck1">
                                                            <label class="custom-control-label control-label-1"
                                                                for="customCheck1">Recuérdame</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6"> <button type="submit"
                                                            class="btn btn-primary float-right">Iniciar Sesión</button>
                                                    </div>
                                                </div>

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

                        <div class="register-prompt">
                            <a href="{{ route('password.request') }}" class="text-primary ">¿Olvidaste
                                tu contraseña?</a> | <a href="{{ route('person.code') }}"
                                class="text-primary">¿Olvidaste tu
                                código?</a>

                            <p>¿Eres nuevo aquí? Regístrate como:</p>

                            <a href="{{ route('register') }}">Usuario</a> |
                            <a href="{{ route('user-study-centers.create') }}">Centro
                                Educativo</a>
                        </div>
                    </div>

                </div>
                <div class="row">


                </div>

            </div>
        </section>
    </div>

    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('js/backend-bundle.min.js') }}"></script>
    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('admin/js/table-treeview.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('admin/js/customizer.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('admin/js/chart-custom.js') }}"></script>
    <!-- app JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- JavaScript para el botón de mostrar/ocultar contraseña -->
    <script>
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // Alternar el tipo de entrada
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Cambiar el SVG
            this.innerHTML = type === 'text' ? `
            <svg class="svg-icon eye-icon" width="20" height="20"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12c0 0 3.1 7 11 7s11-7 11-7-3.1-7-11-7-11 7-11 7z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>` : `
            <svg class="svg-icon eye-icon" width="20" height="20"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12c0 0 3.1 7 11 7s11-7 11-7-3.1-7-11-7-11 7-11 7z"></path>
                <circle cx="12" cy="12" r="3"></circle>
                <line x1="1" y1="1" x2="23" y2="23" stroke="currentColor" stroke-width="2"></line>
            </svg>`;
        });
    </script>
</body>

</html>
