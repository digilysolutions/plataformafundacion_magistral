
@if ($user->role == 'Administrador')
<li class="nav-item nav-icon dropdown">
    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ri-pie-chart-line"></i> cantidad de usuarios online : {{ $activeUsersCount }}
    </a>
</li>
@elseif ($user->role == 'Usuario')
<li class="nav-item nav-icon dropdown">
    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ri-pie-chart-line"></i> Tiempo en Plataforma: 20min
    </a>
</li>

@elseif ($user->role == 'Centro Educativo')
<li class="nav-item nav-icon dropdown">
    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ri-pie-chart-line"></i> Estudiantes Conectados:15
    </a>
</li>
@endif
