
@if ($user->role == 'Administrador')
<li class="nav-item nav-icon dropdown">
    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ri-pie-chart-line"></i> Cantidad de usuarios online : {{ $activeUsersCount }}
    </a>
</li>
@elseif ($user->role == 'Usuario')
<li class="nav-item nav-icon dropdown">
    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ri-pie-chart-line"></i> Tiempo en Plataforma: <span id="tiempoEnPlataforma">00:00:00</span>
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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let horas = 0;
        let minutos = 0;
        let segundos = 0;

        const spanTiempo = document.getElementById('tiempoEnPlataforma');

        // Función para actualizar el contador
        function actualizarTiempo() {
            segundos++;
            if (segundos >= 60) {
                segundos = 0;
                minutos++;
            }
            if (minutos >= 60) {
                minutos = 0;
                horas++;
            }

            // Formatear en HH:MM:SS
            const hh = horas.toString().padStart(2, '0');
            const mm = minutos.toString().padStart(2, '0');
            const ss = segundos.toString().padStart(2, '0');

            spanTiempo.textContent = `${hh}:${mm}:${ss}`;
        }

        // Iniciar el contador
        setInterval(actualizarTiempo, 1000);
    });
</script>
