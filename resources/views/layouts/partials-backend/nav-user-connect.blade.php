
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
        // Obtener el tiempo desde la sesión
        const tiempoEnSegundos = {{ session('tiempo_en_plataforma', 0) }};

        const spanTiempo = document.getElementById('tiempoEnPlataforma');

        // Función para actualizar display y sesión
        function actualizarTiempo() {
            // Incrementar en 1 segundo
            totalSegundos++;
            // Convertir a HH:MM:SS
            const horas = Math.floor(totalSegundos / 3600);
            const minutos = Math.floor((totalSegundos % 3600) / 60);
            const segundos = totalSegundos % 60;

            // Mostrar en la interfaz
            spanTiempo.textContent =
                `${horas.toString().padStart(2, '0')}:${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;

            // Guardar en sesión via AJAX
            fetch('/actualizar-tiempo', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ tiempo: totalSegundos })
            });
        }

        // Mostrar el tiempo inicial
        let totalSegundos = {{ session('tiempo_en_plataforma', 0) }};

        // Mostrar en la interfaz en formato HH:MM:SS
        const initHoras = Math.floor(totalSegundos / 3600);
        const initMinutos = Math.floor((totalSegundos % 3600) / 60);
        const initSegs = totalSegundos % 60;

        spanTiempo.textContent =
            `${initHoras.toString().padStart(2, '0')}:${initMinutos.toString().padStart(2, '0')}:${initSegs.toString().padStart(2, '0')}`;

        // Iniciar el conteo
        setInterval(() => {
            totalSegundos++;
            actualizarTiempo();
        }, 1000);
    });
</script>
