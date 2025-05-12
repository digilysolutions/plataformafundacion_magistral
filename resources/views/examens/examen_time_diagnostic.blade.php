@extends('layouts.app-admin')

@section('title-header-admin')
    Examen Diagnóstico 
@endsection
@section('css')
    <style>
    h1 { color: #333; margin-bottom: 30px; text-align: center; font-size: 1.5em; }

/* Clase para ocultar -- CRUCIAL */
.hidden { display: none !important; }

/* Contenedor Principal */
.app-container { width: 100%; max-width: 700px; position: relative; }

/* Estilos Pantallas (Común) */
.start-session-screen, .setup-screen, .quiz-screen, .results-screen { width: 100%; }

/* --- ESTILOS PANTALLA INICIO SESIÓN (START SESSION) --- */
.start-session-screen {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    text-align: center;
}
.start-session-screen h2 {
    color: #343a40;
    margin-bottom: 25px;
    font-size: 1.4em;
    border-bottom: 1px solid #eee;
    padding-bottom: 15px;
}
.start-session-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}
.start-session-form label {
    font-weight: bold;
    color: #495057;
    font-size: 1.1em;
}
.start-session-form input[type="text"] {
    padding: 10px 15px;
    font-size: 1em;
    border: 1px solid #ced4da;
    border-radius: 4px;
    width: 100%;
    max-width: 350px;
    text-align: center;
}
.start-session-form .error-message {
    color: #dc3545;
    font-size: 0.9em;
    margin-top: -10px; /* Ajuste para que esté más cerca del input */
    min-height: 1.2em; /* Para evitar saltos de layout */
}
.start-session-form .action-button {
    padding: 12px 25px;
    font-size: 1.05em;
    font-weight: bold;
    color: white;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.start-session-form .action-button:hover {
    background-color: #0056b3;
}
.start-session-screen .session-info-note {
    font-size: 0.9em;
    color: #6c757d;
    margin-top: 15px;
}


/* --- ESTILOS PANTALLA DE CONFIGURACIÓN (SETUP) --- */
.setup-screen { background-color: #fff; padding: 20px 30px 30px 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align: center; }
.setup-screen h2 { color: #343a40; margin-bottom: 30px; font-size: 1.4em; border-bottom: 1px solid #eee; padding-bottom: 15px; }
.setup-section { margin-bottom: 25px; text-align: left; }
.setup-section-label { font-weight: bold; color: #495057; font-size: 1.1em; margin-bottom: 15px; display: block; text-align: center;}

/* Estilos Temporizador */
.setup-timer-duration { text-align: center; }
.timer-duration-options { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; padding: 5px 0; }
.duration-option-btn { padding: 8px 15px; font-size: 0.9em; font-weight: 500; color: #6c757d; background-color: #fff; border: 1px solid #ced4da; border-radius: 20px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 1px 2px rgba(0,0,0,0.05); min-width: 70px; text-align: center; }
.duration-option-btn:hover:not(.active) { background-color: #f8f9fa; border-color: #adb5bd; box-shadow: 0 2px 4px rgba(0,0,0,0.08); }
.duration-option-btn.active { background-color: #28a745; color: #fff; border-color: #28a745; font-weight: bold; box-shadow: 0 1px 2px rgba(0,0,0,0.1) inset; }

.setup-message { font-style: italic; color: #6c757d; font-size: 0.9em; margin-top: 10px; text-align: center; }
.grade-options-container { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; padding: 5px 0; min-height: 30px; }
.grade-option-btn, .subject-option-btn { padding: 8px 18px; font-size: 0.95em; font-weight: 500; color: #007bff; background-color: #fff; border: 1px solid #007bff; border-radius: 20px; cursor: pointer; transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.2s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
.grade-option-btn:not(.active):hover, .subject-option-btn:not(.active):hover { background-color: #e7f3ff; box-shadow: 0 3px 6px rgba(0,0,0,0.08); }
.grade-option-btn.active, .subject-option-btn.active { background-color: #007bff; color: #fff; font-weight: bold; box-shadow: 0 1px 2px rgba(0,0,0,0.1) inset; }
.subject-options-grouped-container { display: flex; flex-direction: column; gap: 15px; align-items: center; min-height: 50px; }
.subject-group { width: 100%; max-width: 550px; border: 1px solid #e0e0e0; border-radius: 6px; padding: 15px; background-color: #fdfdfd; }
.subject-group-title { font-weight: bold; color: #343a40; margin-bottom: 15px; text-align: center; font-size: 1.05em; border-bottom: 1px dashed #ccc; padding-bottom: 8px; }
.subject-options-container { display: flex; flex-wrap: wrap; gap: 8px; justify-content: center; padding: 5px 0; }
.setup-divider { border: none; border-top: 1px solid #e0e0e0; margin: 30px auto; width: 80%; }
.setup-item-count .setup-options { display: flex; justify-content: center; gap: 15px; margin-bottom: 0; flex-wrap: wrap; min-height: 40px; }
.setup-option-btn { padding: 10px 22px; font-size: 1.05em; font-weight: bold; color: white; background-color: #28a745; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease, opacity 0.3s ease; min-width: 60px; text-align: center; }
.setup-option-btn:hover:not(:disabled) { background-color: #218838; }
.setup-option-btn:disabled { background-color: #6c757d; opacity: 0.5; cursor: not-allowed; }
.setup-note { font-size: 0.9em; color: #6c757d; margin-top: 30px; margin-bottom: 0; text-align: center; }
/* --- FIN ESTILOS SETUP --- */

/* --- ESTILOS PANTALLA QUIZ --- */
.quiz-screen { display: flex; flex-direction: column; align-items: center; }
.progress-container { width: 100%; max-width: 550px; height: 10px; background-color: #e0e0e0; border-radius: 5px; margin-bottom: 20px; overflow: hidden; }
.progress-bar { height: 100%; width: 0%; background-color: #007bff; border-radius: 5px; transition: width 0.4s ease-out; }
.question-card { background-color: #ffffff; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); width: 100%; max-width: 550px; margin-bottom: 25px; display: flex; flex-direction: column; overflow: hidden; }
.card-header { display: flex; justify-content: space-between; align-items: center; padding: 10px 15px 5px 15px; border-bottom: 1px solid #f0f0f0; background-color: #fafafa; min-height: 40px; flex-wrap: wrap; gap: 5px 15px;}
.category { font-size: 0.75em; font-weight: bold; padding: 3px 8px; border-radius: 12px; color: #fff; text-transform: uppercase; letter-spacing: 0.5px; display: inline-block; margin-right: 5px; flex-shrink: 0; order: 1;}
.category.ciencias-sociales { background-color: #5bc0de; } .category.ciencias-sociales-cat { background-color: #5bc0de; } .category.ciencias-naturales-cat { background-color: #28a745; } .category.espanol-cat { background-color: #fd7e14; } .category.matematica-cat { background-color: #6f42c1; } .category.matematicas-cat { background-color: #6f42c1; } .category.default-category-style { background-color: #6c757d; }
.timer-container { display: none; align-items: center; gap: 5px; color: #555; order: 3; margin-left: auto; }
.quiz-screen.timer-active .timer-container { display: flex; }
.timer-container i { font-size: 1.1em; color: #888; }
.timer-display { font-size: 1.2em; font-weight: bold; min-width: 25px; text-align: right; color: #333; transition: color 0.3s ease; }
.timer-display.low-time { color: #dc3545; }
.identifier { font-size: 0.8em; color: #888; text-align: right; flex-shrink: 0; order: 2;}
.attempt-indicator { text-align: center; font-size: 0.85em; color: #6c757d; padding: 5px 15px 10px 15px; font-style: italic; border-bottom: 1px dashed #eee; display: none; }
.question-content { padding: 20px 25px 5px 25px; text-align: center; }
.question-text { font-size: 1.15em; color: #333; line-height: 1.5; min-height: 50px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;}
.help-button { display: inline-flex; align-items: center; gap: 5px; padding: 6px 12px; font-size: 0.85em; background-color: #17a2b8; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; margin-bottom: 5px; transition: background-color 0.3s ease; }
.help-button:hover:not(:disabled) { background-color: #117a8b; } .help-button i { margin-right: 4px; } .help-button:disabled { opacity: 0.5; cursor: not-allowed; }
.answers-panel { background-color: #f8f9fa; padding: 15px 25px 5px 25px; border-top: 1px solid #eee;}
.options-container { padding: 0 0 15px 0; min-height: 100px; }
.answer-option { display: flex; align-items: center; margin-bottom: 12px; padding: 8px; border-radius: 4px; transition: background-color 0.3s ease, border 0.3s ease; border: 1px solid #ddd; background-color: #fff;}
.answer-option:hover:not(:has(input:disabled)) { background-color: #e9ecef; }
.answer-option input[type="radio"] { margin-right: 10px; cursor: pointer; transform: scale(1.1); }
.answer-option label { color: #444; cursor: pointer; flex-grow: 1; font-size: 0.95em; }
.answer-option.correct { background-color: #d4edda; border-color: #c3e6cb; } .answer-option.correct label { color: #155724; font-weight: bold; }
.answer-option.incorrect { background-color: #f8d7da; border-color: #f5c6cb; } .answer-option.incorrect label { color: #721c24; }
/* .reveal-correct quitado porque no se revela en el quiz */
.check-answer-btn { display: block; width: 100%; margin: 10px 0 15px 0; padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1em; font-weight: bold; transition: background-color 0.3s ease; }
.check-answer-btn:hover:not(:disabled) { background-color: #0056b3; } .check-answer-btn:disabled { background-color: #6c757d; opacity: 0.7; cursor: not-allowed; }
.feedback-message { display: flex; align-items: center; justify-content: center; gap: 8px; text-align: center; font-weight: bold; min-height: 1.5em; padding-bottom: 10px; font-size: 0.9em; }
.feedback-icon { font-size: 1.1em; } .correct-icon { color: green; } .incorrect-icon { color: red; } .timeout-icon { color: orange; }
.navigation-controls { display: flex; justify-content: space-between; align-items: center; width: 100%; max-width: 550px; margin: 15px auto 0 auto; padding: 0 15px; }
.attempt-status { font-size: 0.85em; font-weight: bold; color: #0056b3; background-color: #e7f3ff; padding: 4px 10px; border-radius: 15px; flex-shrink: 0; }
#question-counter { font-size: 0.9em; color: #555; text-align: center; flex-grow: 1; margin: 0 10px; }
#next-btn { padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1em; font-weight: bold; transition: background-color 0.3s ease, opacity 0.3s ease; flex-shrink: 0; }
#next-btn:hover:not(:disabled) { background-color: #218838; } #next-btn:disabled { background-color: #6c757d; opacity: 0.6; cursor: not-allowed; }
/* --- FIN ESTILOS QUIZ --- */

/* --- ESTILOS PANTALLA RESULTADOS --- */
.results-screen { background-color: #f8f9fa; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align: center; }
.results-screen > h2 { color: #343a40; margin-bottom: 25px; font-size: 1.6em; }
.attempt-results-section { margin-bottom: 30px; padding: 20px; background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
.attempt-results-section h3 { font-size: 1.4em; color: #0056b3; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #0056b3; }
.attempt-results-section .overall-stats { margin-bottom: 25px; display: block; text-align: center; border: none; padding: 10px 0 0 0; box-shadow: none; background-color: transparent;}
.attempt-results-section .overall-stats strong { font-size: 1.1em; margin-bottom: 8px;}
.attempt-results-section .overall-stats .count-line { font-size: 1.05em; }
.attempt-results-section .overall-stats .percentage { font-size: 0.95em; }
.attempt-results-section h4.category-stats-title,
.attempt-results-section h4.detailed-results-title { font-size: 1.15em; color: #495057; margin-top: 20px; margin-bottom: 10px; padding-bottom: 8px; border-bottom: 1px solid #ced4da; text-align: left; }
.stats-list { list-style: none; padding: 0; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 20px; }
.stats-list li { background-color: #fff; padding: 15px; border-radius: 5px; font-size: 0.9em; border: 1px solid #dee2e6; display: flex; flex-direction: column; gap: 5px; text-align: left; }
.stats-list li strong { font-size: 1.1em; } .stats-list .count-line { font-size: 1em; }
.correct-count { color: #28a745; font-weight: bold; padding: 0 2px; }
.incorrect-count { color: #dc3545; font-weight: bold; padding: 0 2px; }
.results-divider { border: none; border-top: 2px dashed #adb5bd; margin: 40px auto; width: 70%; }
.table-actions { text-align: center; margin-bottom: 10px; }
.toggle-button { padding: 8px 15px; background-color: #6c757d; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9em; transition: background-color 0.3s ease; }
.toggle-button:hover { background-color: #5a6268; }
.table-container { max-height: 300px; overflow-y: auto; border: 1px solid #dee2e6; border-radius: 5px; background-color: #fff; }
.results-table { width: 100%; border-collapse: collapse; }
.results-table th, .results-table td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #dee2e6; vertical-align: middle; transition: background-color 0.2s ease; }
.results-table th { background-color: #e9ecef; font-weight: bold; color: #495057; position: sticky; top: 0; z-index: 1; }
.results-table tbody tr:nth-child(even) { background-color: #f8f9fa; }
.results-table tbody tr:hover td { background-color: #e9ecef; }
.results-table td.result-cell.correct { color: #155724; font-weight: bold; }
.results-table td.result-cell.incorrect { color: #721c24; font-weight: bold; }
.results-table .correct-answer-cell { display: none; } /* Oculto por defecto */
.results-table.show-correct-answers .correct-answer-cell { display: table-cell; } /* Mostrar con clase */
/* Columna de Ayuda eliminada de la tabla visible */
.results-table .time-header, .results-table .time-cell { display: none; }
.results-table.show-time-column .time-header,
.results-table.show-time-column .time-cell { display: table-cell; }
.results-table td.time-cell { font-size: 0.9em; text-align: center; color: #555;}
.results-table th.time-header { text-align: center;}

.results-actions.global-actions { margin-top: 40px; padding-top: 20px; border-top: 1px solid #e0e0e0; display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
.restart-button, .download-button { padding: 12px 25px; border: none; border-radius: 5px; cursor: pointer; font-size: 1em; font-weight: bold; transition: background-color 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease; display: inline-flex; align-items: center; gap: 8px; }
.restart-button { background-color: #007bff; color: white; }
.restart-button:hover:not(:disabled) { background-color: #0056b3; }
.restart-button:disabled { background-color: #6c757d; opacity: 0.65; cursor: not-allowed; }
.download-button { background-color: #17a2b8; color: white; }
.download-button:hover { background-color: #117a8b; }
.download-button i { font-size: 0.9em; }
/* --- FIN ESTILOS RESULTADOS --- */

/* --- Media Queries --- */
@media (max-width: 640px) {
    body { padding: 15px; } .app-container { max-width: 95%; } h1 { font-size: 1.6em; }
    .start-session-screen { padding: 20px; }
    .start-session-screen h2 { font-size: 1.3em; }
    .start-session-form label { font-size: 1em; }
    .start-session-form input[type="text"] { font-size: 0.9em; padding: 8px 12px; }
    .start-session-form .action-button { font-size: 1em; padding: 10px 20px; }

    .setup-screen { padding: 15px; } .setup-screen h2 { font-size: 1.4em; }
    .setup-section-label { font-size: 1em; }
    .duration-option-btn, .grade-option-btn, .subject-option-btn { font-size: 0.9em; padding: 7px 15px;}
    .subject-group { padding: 10px; } .subject-group-title { font-size: 1em; }
    .setup-option-btn { font-size: 1em; padding: 9px 18px;}
    .help-button { font-size: 0.8em; padding: 5px 10px; margin-top: 8px;}
    .question-card { margin-bottom: 15px;}
    .card-header { padding: 8px 10px; gap: 5px 10px; }
    .timer-container { gap: 3px;} .timer-display { font-size: 1.1em;}
    .question-content { padding: 15px 20px 5px 20px;}
    .question-text { font-size: 1.1em; } .answer-option label { font-size: 0.9em; }
    .answers-panel { padding: 15px;}
    .navigation-controls { padding: 0 10px; margin-top: 15px; gap: 15px; flex-wrap: wrap; justify-content: center; }
    .attempt-status { order: 1; font-size: 0.8em; padding: 3px 8px; margin-bottom: 5px; }
    #question-counter { order: 2; flex-grow: 0; margin: 0; margin-bottom: 5px;}
    #next-btn { order: 3; width: auto; padding: 8px 18px; font-size: 0.9em;}
    .feedback-message { font-size: 0.85em; }
    .results-screen { padding: 15px; } .attempt-results-section { padding: 15px; }
    .attempt-results-section h3 { font-size: 1.3em; } .attempt-results-section h4 { font-size: 1.1em; }
    .stats-list { grid-template-columns: 1fr; } .table-actions { margin-bottom: 15px; }
    .toggle-button { font-size: 0.85em; padding: 7px 12px; }
    .table-container { max-height: 200px; } .results-table th, .results-table td { font-size: 0.8em; padding: 6px 8px;}
    .results-actions.global-actions { flex-direction: column; gap: 15px; align-items: center; margin-top: 30px; }
    .restart-button, .download-button { width: 90%; justify-content: center; }
}
    </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
@section('content-admin')
<h1>Resolución de Items para Exámenes Diagnóstico</h1>


    <!-- ============================ -->
    <!-- Pantalla 0: Inicio Sesión  -->
    <!-- ============================ -->
    <div class="start-session-screen" id="startSessionScreen">
        <h2>Iniciar Sesión de Diagnóstico</h2>
        <div class="start-session-form">
            <label for="trackingCodeInput">Código de Seguimiento del Estudiante:</label>
            <input type="text" id="trackingCodeInput" placeholder="Ingresa tu código aquí" required>
            <p class="error-message hidden" id="trackingCodeError"></p>
            <button id="startSessionButton" class="action-button">Comenzar Diagnóstico</button>
        </div>
        <p class="session-info-note">La fecha y hora de inicio se registrarán automáticamente.</p>
    </div>

    <!-- ============================ -->
    <!-- Pantalla 1: Configuración    -->
    <!-- ============================ -->
    <div class="setup-screen hidden" id="setupScreen">
         <h2>Configuración de la Sesión</h2>
         <!-- Configuración: Timer, Grado, Asignatura, Cantidad -->
         <div class="setup-section setup-timer-duration">
             <p class="setup-section-label">1. Elige duración del temporizador (por pregunta):</p>
             <div class="timer-duration-options" id="timerDurationOptions">
                 <button class="duration-option-btn active" data-duration="30">30 seg</button>
                 <button class="duration-option-btn" data-duration="45">45 seg</button>
                 <button class="duration-option-btn" data-duration="60">60 seg</button>
                 <button class="duration-option-btn" data-duration="0">Sin Límite</button>
             </div>
         </div>
         <hr class="setup-divider">
         <div class="setup-section setup-grade-selection">
             <p class="setup-section-label">2. Elige tu Grado Escolar:</p>
             <div class="grade-options-container" id="gradeOptionsContainer">
                 <p class="setup-message" id="grade-message">Cargando grados...</p>
             </div>
         </div>
         <hr class="setup-divider">
         <div class="setup-section setup-subject-selection">
             <p class="setup-section-label">3. Elige una Asignatura:</p>
             <div class="subject-options-grouped-container" id="subjectOptionsContainer">
                  <p class="setup-message" id="subject-message">Selecciona un grado para ver las asignaturas.</p>
             </div>
         </div>
         <hr class="setup-divider">
         <div class="setup-section setup-item-count">
             <p class="setup-section-label">4. ¿Cuántos items quieres resolver?</p>
             <div class="setup-options" id="itemCountOptions">
                 <button class="setup-option-btn" data-count="5" disabled title="Selecciona grado y asignatura">5</button>
                 <button class="setup-option-btn" data-count="10" disabled title="Selecciona grado y asignatura">10</button>
                 <button class="setup-option-btn" data-count="15" disabled title="Selecciona grado y asignatura">15</button>
                 <button class="setup-option-btn" data-count="20" disabled title="Selecciona grado y asignatura">20</button>
             </div>
             <p class="setup-message hidden" id="count-message">Selecciona grado y asignatura.</p>
         </div>
         <p class="setup-note">(Las preguntas se seleccionarán según tus filtros<span id="filterSelectionNote"></span>)</p>
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
             <div class="attempt-indicator" id="attemptIndicator"></div>
             <div class="question-content">
                 <p class="question-text"></p>
                 <button id="help-btn" class="help-button hidden">
                     <i class="fas fa-question-circle"></i> Mostrar Ayuda
                 </button>
             </div>
             <div class="answers-panel">
                 <div class="options-container"></div>
                 <button class="check-answer-btn">Verificar Respuesta</button>
                 <p class="feedback-message" aria-live="polite"></p>
             </div>
         </div>
         <div class="navigation-controls">
             <span class="attempt-status" id="attemptStatusIndicator">Intento 1</span>
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
             <h4 class="category-stats-title">Detalle por Asignatura (Intento Inicial):</h4>
             <ul id="initial-stats-list" class="stats-list"></ul>
             <h4 class="detailed-results-title">Resultados por Pregunta (Intento Inicial):</h4>
             <div class="table-actions">
                 <button id="initial-toggle-correct-btn" class="toggle-button">Mostrar Respuestas Correctas</button>
             </div>
             <div class="table-container">
                 <table class="results-table initial-results-table" id="initialResultsTable">
                     <thead>
                         <tr>
                             <th>Pregunta ID (Grado)</th>
                             <th>Tu Respuesta</th>
                             <th class="correct-answer-cell">Respuesta Correcta</th> <!-- Para mostrar/ocultar -->
                             <th>Resultado</th>
                             <th class="time-header">Tiempo (seg)</th>
                         </tr>
                     </thead>
                     <tbody id="initial-results-table-body"></tbody>
                 </table>
             </div>
         </div>
         <!-- ***** FIN SECCIÓN: Intento Inicial ***** -->

         <hr class="results-divider hidden" id="resultsDivider">

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
             <h4 class="category-stats-title">Detalle por Asignatura (Reintento):</h4>
             <ul id="retry-stats-list" class="stats-list"></ul>
             <h4 class="detailed-results-title">Resultados por Pregunta (Reintento):</h4>
              <div class="table-actions">
                 <button id="retry-toggle-correct-btn" class="toggle-button">Mostrar Respuestas Correctas</button>
             </div>
             <div class="table-container">
                 <table class="results-table retry-results-table" id="retryResultsTable">
                     <thead>
                         <tr>
                             <th>Pregunta ID (Grado)</th>
                             <th>Tu Respuesta</th>
                             <th class="correct-answer-cell">Respuesta Correcta</th> <!-- Para mostrar/ocultar -->
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
             <button id="restart-btn" class="restart-button" disabled>Nuevo Intento (Incorrectas)</button>
             <button id="new-quiz-btn" class="restart-button">Nueva Sesión</button> <!-- Este botón ahora lleva a la pantalla de inicio de sesión -->
             <button id="download-btn" class="download-button">
                 <i class="fas fa-download"></i> Descargar Resultados
             </button>
         </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/examen/diagnostic-time/questions.js') }}"></script>
    <script src="{{ asset('js/examen/diagnostic-time/script.js') }}"></script>
@endsection
