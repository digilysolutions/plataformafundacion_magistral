<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RD CALIFICA  - Cargando...</title>
    <link rel="shortcut icon" href="{{ asset('img/icono/fm-plataforma.png') }}" />
    <link rel="stylesheet" href="{{asset('css/splash-style-video-final.css')}}">

   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="splash-screen">
        <!-- Tarjetas Móviles -->
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

        <!-- Contenido Central (Título y Barra de Progreso) -->
        <div class="center-content">
            <h1><span class="logo-rd">RD</span><span class="logo-califica">CALIFICA</span></h1>
            <!-- Contenedor de la Barra de Progreso -->
            <div class="progress-bar-container">
                <div class="progress-bar-fill"></div>
            </div>
            <!-- El spinner y el texto de carga han sido removidos -->
        </div>
    </div>

    <!-- SCRIPT: Barra de Progreso y Redirección -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const splash = document.querySelector('.splash-screen');
            const progressBarFill = document.querySelector('.progress-bar-fill'); // REFERENCIA A LA BARRA
            const redirectUrl = 'https://plataforma.fundacionmagistral.org/login'; // URL de destino ACTUALIZADA
            const totalDuration = 30000; // Duración total en milisegundos (30 segundos) - ACTUALIZADA
            let startTime = null;
            let animationFrameId = null;
            let hasClicked = false; // Flag para saber si el usuario hizo clic

            // Verifica que ambos elementos existan
            if (splash && progressBarFill) {
                // Función para ocultar el splash (llamada por clic)
                function hideSplashScreenOnClick() {
                    if (hasClicked) return; // Evita múltiples clics
                    hasClicked = true; // Marca que se hizo clic

                    // Cancela la animación de la barra y la redirección programada
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                    }

                    // Aplica estilos para iniciar la transición CSS de fade-out
                    splash.style.opacity = '0';
                    splash.style.visibility = 'hidden';

                    // Opcional: Elimina el elemento del DOM después de la transición
                    setTimeout(() => {
                        if (splash.parentNode) { // Verifica si todavía existe
                           splash.remove();
                        }
                    }, 600); // Coincide con la duración de la transición CSS

                    // Remueve el listener para evitar más clics
                    splash.removeEventListener('click', hideSplashScreenOnClick);
                }

                // Función para actualizar la barra de progreso
                function updateProgress(timestamp) {
                    if (hasClicked) return; // Si ya se hizo clic, no hace nada

                    if (!startTime) {
                        startTime = timestamp;
                    }

                    const elapsedTime = timestamp - startTime;
                    const progress = Math.min((elapsedTime / totalDuration) * 100, 100);

                    // Actualiza el ancho de la barra de relleno
                    progressBarFill.style.width = progress + '%';

                    if (progress < 100) {
                        // Continúa la animación si no ha terminado
                        animationFrameId = requestAnimationFrame(updateProgress);
                    } else {
                        // Progreso completado: inicia la redirección
                        // Opcional: Pequeña pausa antes de redirigir
                        setTimeout(() => {
                            if (!hasClicked) { // Verifica de nuevo por si se hizo clic justo al final
                                window.location.replace(redirectUrl); // Usamos replace para mejor UX
                            }
                        }, 100); // Pausa de 100ms
                    }
                }

                // Añade el event listener para el clic en el splash screen
                splash.addEventListener('click', hideSplashScreenOnClick);

                // Inicia la animación de la barra de progreso
                animationFrameId = requestAnimationFrame(updateProgress);

            } else {
                // Mensaje de error si no se encuentran los elementos necesarios
                console.error("Error: No se encontró el splash screen o la barra de progreso.");
                // Fallback: si algo falla, redirige inmediatamente o tras un corto tiempo
                // setTimeout(() => { if(!hasClicked) window.location.replace(redirectUrl); }, 500); // Actualizado para usar replace también
            }
        });
    </script>
</body>
</html>
