
@if ($user->role != 'Usuario')
<li class="nav-item nav-icon dropdown">
    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ri-pie-chart-line"></i> Online: {{ $activeUsersCount }}
    </a>
</li>
@else
<li class="nav-item nav-icon dropdown">
    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ri-pie-chart-line"></i> Tiempo en Plataforma: 20min
    </a>
</li>
@endif
