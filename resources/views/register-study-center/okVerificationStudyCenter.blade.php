


<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title> Solicitud Exitosa </title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}  " />
      <link rel="stylesheet" href=" {{ asset('css/backend-plugin.min.css') }}  ">
      <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }}  ">
      <link rel="stylesheet" href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }} ">
      <link rel="stylesheet" href="{{ asset('vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}  ">
      <link rel="stylesheet" href="{{ asset('vendor/remixicon/fonts/remixicon.css') }}  ">  </head>
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
                                 <img src="{{ asset('img/login/mail.png') }}  " class="img-fluid" width="80" alt="">
                                 <h2 class="mt-3 mb-0">Verificación de Correo Exitosa!</h2>
                                 <p>¡Gracias por verificar su correo!</p>
                                 <p>En breve, recibirás un formulario que deberás completar con la información de tu centro educativo. Una vez que lo envíes, podremos proceder con tu registro en la plataforma.</p>
                                 <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en contactarnos. </p>
                                 <p>¡Estamos encantados de tenerte con nosotros!</p>

                                 <p class="cnf-mail mb-1">GEn breve se te enviara un formulario que debera de llenar para proceder a registrarte en la plataforma.</p>

                                 <div class="d-inline-block w-100">
                                    <a href="/" class="btn btn-primary mt-3">Regresar a la página de inicio</a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="{{ asset('img/login/01.png') }}  " class="img-fluid image-right" alt="">
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
  </body>
</html>

