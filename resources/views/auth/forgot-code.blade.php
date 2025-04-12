


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>POS Dash | Recuperar Código</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('img/icono/fm-plataforma.jpg') }}" />
      <link rel="stylesheet" href="{{ asset('css/backend-plugin.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }}">
      <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('fonts/remixicon.css') }}">  </head>
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
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                
                                 <h2 class="mb-2">Solicitar  </h2>
                                 <p> ¿Olvidó su código de seguimiento? No hay problema. Simplemente déjenos saber su dirección de correo electrónico y le enviaremos un enlace para obtener el código de seguimiento que le permitirá entrar al sitio.</p>
                                 <form method="POST" action="{{ route('person.sendEmailWhithCode') }}">
                                    @csrf
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" id="email" type="email" name="email"  placeholder=" ">
                                             <label>{{__('Email')}}</label>
                                          </div>
                                          <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">  Enviar enlace</button>
                                    <p class="mt-3">
                                        ¿Ya tienes una cuenta?" <a href="{{ route('login') }}"
                                            class="text-primary">Iniciar sesión</a>
                                    </p>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="{{asset('img/login/01.png')}}" class="img-fluid image-right" alt="">
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
      <script src="{{ asset('js/backend-bundle.min.js') }}"></script>
      <!-- Table Treeview JavaScript -->
      <script src="{{ asset('admin/js/table-treeview.js') }}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('admin/js/customizer.js') }}"></script>
      <!-- Chart Custom JavaScript -->
      <script async src="{{ asset('admin/js/chart-custom.js') }}"></script>
      <!-- app JavaScript -->
      <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>