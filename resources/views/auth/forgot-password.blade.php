


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>POS Dash | Recuperar Contraseña</title>
      
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
                                 <h2 class="mb-2">{{__('Reset Password')}}</h2>
                                 <p> {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                                 <form method="POST" action="{{ route('password.email') }}">
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
                                    <button type="submit" class="btn btn-primary">  {{ __('Email Password Reset Link') }}</button>
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