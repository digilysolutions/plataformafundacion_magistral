<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma ITEMS - Cargando...</title>
    <link rel="stylesheet" href="{{asset('css/splash-style-video-final.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="splash-screen">
        <!-- Tarjetas Móviles (20) -->
        <div class="moving-card card-1 color-pisa"> <div class="card-content"><span>Pruebas PISA</span></div> </div>
        <div class="moving-card card-2 color-nacionales"> <div class="card-content"><span>Pruebas Nacionales</span></div> </div>
        <div class="moving-card card-3 color-diagnostico"> <div class="card-content"><span>Exámenes Diagnósticos</span></div> </div>
        <div class="moving-card card-4 color-other1"> <div class="card-content"><span>VALIDAR ITEMS</span></div> </div>
        <div class="moving-card card-5 color-diagnostico"> <div class="card-content"><span>Diagnósticos</span></div> </div>
        <div class="moving-card card-6 color-nacionales"> <div class="card-content"><span>Nacionales 2024</span></div> </div>
        <div class="moving-card card-7 color-pisa"> <div class="card-content"><span>Resultados PISA</span></div> </div>
        <div class="moving-card card-8 color-other2"> <div class="card-content"><span>REPORTES</span></div> </div>
        <div class="moving-card card-9 color-nacionales"> <div class="card-content"><span>Pruebas Nacionales</span></div> </div>
        <div class="moving-card card-10 color-diagnostico"> <div class="card-content"><span>Exámenes Diagnósticos</span></div> </div>
        <div class="moving-card card-11 color-pisa"> <div class="card-content"><span>PISA ítems</span></div> </div>
        <div class="moving-card card-12 color-other1"> <div class="card-content"><span>ANALÍTICA</span></div> </div>
        <div class="moving-card card-13 color-other2"> <div class="card-content"><span>GESTIÓN</span></div> </div>
        <div class="moving-card card-14 color-pisa"> <div class="card-content"><span>PISA 2025 PREP</span></div> </div>
        <div class="moving-card card-15 color-nacionales"> <div class="card-content"><span>Resultados PN</span></div> </div>
        <div class="moving-card card-16 color-diagnostico"> <div class="card-content"><span>Diagnóstico Rápido</span></div> </div>
        <div class="moving-card card-17 color-other1"> <div class="card-content"><span>Exportar Datos</span></div> </div>
        <div class="moving-card card-18 color-pisa"> <div class="card-content"><span>Ítems PISA</span></div> </div>
        <div class="moving-card card-19 color-nacionales"> <div class="card-content"><span>PN - Histórico</span></div> </div>
        <div class="moving-card card-20 color-diagnostico"> <div class="card-content"><span>Evaluar</span></div> </div>

        <!-- Contenedor del Frame de Video -->
        <div class="video-frame-container">
            <div class="video-frame">
                 <video
                    src="https://cdn.pixabay.com/video/2017/03/08/8256-207598612_large.mp4"
                    autoplay
                    muted
                    loop
                    playsinline>
                    Tu navegador no soporta la etiqueta de video.
                 </video>
            </div>
        </div>

        <!-- Contenido Central (Texto y Loader) -->
        <div class="center-content">
            <h1>Plataforma ITEMS</h1>
            <div class="loader"></div>
        </div>
    </div>

    <!-- ****** NUEVO SCRIPT: Ocultar al hacer clic y redirigir ****** -->
    <script>
        // Espera a que el HTML esté listo
        document.addEventListener('DOMContentLoaded', () => {
            const splash = document.querySelector('.splash-screen');

            if (splash) {
                // Función para ocultar el splash y redirigir
                function hideSplashScreen() {
                    // Aplica estilos para iniciar la transición CSS de fade-out
                    splash.style.opacity = '0';
                    splash.style.visibility = 'hidden';

                    // Opcional: Elimina el elemento del DOM después de que termine la transición
                    // La duración (600ms) debe coincidir con la transición en el CSS
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 600);

                    // Importante: Remueve el event listener para que no se pueda volver a activar
                    splash.removeEventListener('click', hideSplashScreen);
                }

                // Añade el event listener para el clic EN CUALQUIER PARTE del splash screen
                splash.addEventListener('click', hideSplashScreen);

                // Redirigir después de 600 ms automáticamente
                setTimeout(hideSplashScreen, 15000);
            }
        });
    </script>
    <!-- ****** FIN NUEVO SCRIPT ****** -->

</body>
</html>
