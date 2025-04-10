


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Fundación Magistral | Solicitar Registro</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('img/icono/fm-plataforma.jpg') }}" />
      <link rel="stylesheet" href="{{ asset('css/backend-plugin.min.css') }} ">
      <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }} ">
      <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
      <link rel="stylesheet" href="{{ asset('vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">  </head>
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
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success m-4">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                 <h2 class="mb-2">Solicitar Registro</h2>
                                 <p>Solicitar el registro del Centro Educativo.</p>
                                 <form method="POST" action="{{ route('register-study-centers.processStore') }}">
                                    @csrf

                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input name="name" class="floating-input form-control @error('name') is-invalid @enderror" type="text" placeholder=" " value="{{old('name')}}" required autofocus autocomplete="name">
                                             <label>Nombre  *</label>
                                             <div class="help-block with-errors"></div>
                                          </div>
                                       </div>

                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input name="mail" class="floating-input form-control @error('mail') is-invalid @enderror" type="email" placeholder=" " required>
                                             <label>Correo *</label>
                                             <div class="help-block with-errors"></div>
                                          </div>
                                       </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                    <p class="mt-3">
                                        ¿Ya tienes una cuenta?" <a href="{{ route('login') }}" class="text-primary">Iniciar sesión</a>
                                    </p>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="{{ asset('img/login/01.png') }}" class="img-fluid image-right" alt="">
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
