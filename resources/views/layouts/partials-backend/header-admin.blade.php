<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title-header-admin')</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('img/icono/fm-plataforma.png') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/backend-plugin.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/backend.css?v=1.0.0') }}">
<link rel="stylesheet" href="{{ asset('admin/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendor/remixicon/fonts/remixicon.css') }}">
@yield('css')
</head>

