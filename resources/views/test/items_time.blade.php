@extends('layouts.app-admin')

@section('title-header-admin')
    Items  Pisa Prueba
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/items/style.css') }}" >

@endsection
@section('content-admin')

<div class="app-container">

    <!-- ============================ -->
    <!-- Pantalla 1: Configuración    -->
    <!-- ============================ -->
    <div class="setup-screen" id="setupScreen">
         <h2>Configuración de la Sesión qqq</h2>
         <div class="setup-section setup-timer-duration">
             <p class="setup-section-label">1. Elige duración del temporizador:</p>
             <div class="timer-duration-options" id="timerDurationOptions">
                 <button class="duration-option-btn active" data-duration="30">30 seg</button>
                 <button class="duration-option-btn" data-duration="45">45 seg</button>
                 <button class="duration-option-btn" data-duration="60">60 seg</button>
                 <button class="duration-option-btn" data-duration="0">Sin Límite</button>
             </div>
         </div>
         <hr class="setup-divider">
         <div class="setup-section setup-category-selection">
             <p class="setup-section-label">2. Elige una categoría:</p>
             <div class="category-options-container" id="categoryOptionsContainer"></div>
         </div>
         <hr class="setup-divider">
         <div class="setup-section setup-item-count">
             <p class="setup-section-label">3. ¿Cuántos items quieres resolver?</p>
             <div class="setup-options">
                 <button class="setup-option-btn" data-count="10">10</button>
                 <button class="setup-option-btn" data-count="15">15</button>
                 <button class="setup-option-btn" data-count="20">20</button>
             </div>
         </div>
         <p class="setup-note">(Las preguntas se seleccionarán aleatoriamente<span id="categoryFilterNote"></span>)</p>
    </div>

    <!-- ============================ -->
    <!-- Pantalla 2: Quiz             -->
    <!-- ============================ -->
    <div class="quiz-screen hidden" id="quizScreen">
         <div class="progress-container">
             <div class="progress-bar" id="progressBar"></div>
         </div>
         <div class="question-card" id="questionCard">
             <div class="card-header">
                 <span class="category"></span>
                 <div class="timer-container">
                     <i class="far fa-clock"></i>
                     <span id="timer-display" class="timer-display">--</span>
                 </div>
                 <span class="identifier"></span>
             </div>
             <div class="attempt-indicator" id="attemptIndicator"></div> <!-- Indicador de Intento -->
             <div class="question-content">
                 <p class="question-text"></p>
             </div>
             <div class="answers-panel">
                 <div class="options-container"></div>
                 <button class="check-answer-btn">Verificar Respuesta</button>
                 <p class="feedback-message" aria-live="polite"></p>
             </div>
         </div>
         <div class="navigation-controls">
             <span class="attempt-status" id="attemptStatusIndicator">Intento 1</span> <!-- Indicador en barra -->
             <span id="question-counter">Pregunta X de Y</span>
             <button id="next-btn" disabled>Siguiente &raquo;</button>
         </div>
    </div>

    <!-- ============================ -->
    <!-- Pantalla 3: Resultados       -->
    <!-- ============================ -->
    <div class="results-screen hidden" id="resultsScreen">
         <h2>Resultados Finales</h2>

         <!-- ***** SECCIÓN: Intento Inicial ***** -->
         <div class="attempt-results-section" id="initialAttemptResultsSection">
             <h3>Intento Inicial</h3>
             <div class="overall-stats">
                 <strong>Total General:</strong>
                 <span class="count-line">
                     <span id="initial-total-correct" class="correct-count">0</span> Correctas /
                     <span id="initial-total-incorrect" class="incorrect-count">0</span> Incorrectas
                 </span>
                 <div id="initial-percentage-correct" class="percentage"></div>
             </div>
             <h4 class="category-stats-title">Detalle por Categoría:</h4>
             <ul id="initial-stats-list" class="stats-list"></ul>
             <h4 class="detailed-results-title">Resultados por Pregunta:</h4>
             <div class="table-actions">
                 <button id="initial-toggle-correct-btn" class="toggle-button">Mostrar Respuestas Correctas</button>
             </div>
             <div class="table-container">
                 <table class="results-table initial-results-table" id="initialResultsTable">
                     <thead>
                         <tr>
                             <th>Pregunta ID</th>
                             <th>Tu Respuesta</th>
                             <th class="correct-answer-cell">Respuesta Correcta</th>
                             <th>Resultado</th>
                             <th class="time-header">Tiempo (seg)</th>
                         </tr>
                     </thead>
                     <tbody id="initial-results-table-body"></tbody>
                 </table>
             </div>
         </div>
         <!-- ***** FIN SECCIÓN: Intento Inicial ***** -->

         <hr class="results-divider hidden" id="resultsDivider"> <!-- Separador Oculto -->

         <!-- ***** SECCIÓN: Reintento (Oculta por defecto) ***** -->
         <div class="attempt-results-section hidden" id="retryAttemptResultsSection">
             <h3>Reintento (Preguntas Incorrectas)</h3>
             <div class="overall-stats">
                 <strong>Total General (Reintento):</strong>
                 <span class="count-line">
                     <span id="retry-total-correct" class="correct-count">0</span> Correctas /
                     <span id="retry-total-incorrect" class="incorrect-count">0</span> Incorrectas
                 </span>
                 <div id="retry-percentage-correct" class="percentage"></div>
             </div>
             <h4 class="category-stats-title">Detalle por Categoría (Reintento):</h4>
             <ul id="retry-stats-list" class="stats-list"></ul>
             <h4 class="detailed-results-title">Resultados por Pregunta (Reintento):</h4>
              <div class="table-actions">
                 <button id="retry-toggle-correct-btn" class="toggle-button">Mostrar Respuestas Correctas</button>
             </div>
             <div class="table-container">
                 <table class="results-table retry-results-table" id="retryResultsTable">
                     <thead>
                         <tr>
                             <th>Pregunta ID</th>
                             <th>Tu Respuesta</th>
                             <th class="correct-answer-cell">Respuesta Correcta</th>
                             <th>Resultado</th>
                             <th class="time-header">Tiempo (seg)</th>
                         </tr>
                     </thead>
                     <tbody id="retry-results-table-body"></tbody>
                 </table>
             </div>
         </div>
         <!-- ***** FIN SECCIÓN: Reintento ***** -->


         <!-- Botones de Acción Globales -->
         <div class="results-actions global-actions">
             <button id="restart-btn" class="restart-button">Nuevo Intento (Incorrectas)</button>
             <button id="new-quiz-btn" class="restart-button">Iniciar Nuevo Quiz</button>
             <button id="download-btn" class="download-button">
                 <i class="fas fa-download"></i> Descargar Resultados
             </button>
         </div>
    </div>

</div> <!-- Fin de .app-container -->

@endsection
@section('js')
<script src="{{ asset('js/items/questions.js') }}"></script>
<script src="{{ asset('js/items/script.js') }}"></script>
@endsection
