

@extends('layouts.app-admin')

@section('title-header-admin')
    Items  Pisa Práctica
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style/style.css') }}">
@endsection
@section('content-admin')


                <!-- ============================ -->
                <!-- Pantalla 1: Configuración    -->
                <!-- ============================ -->
                <div class="setup-screen" id="setupScreen">
                    <h2>Configuración de la Sesión</h2>

                    <!-- Sección Categorías -->
                    <div class="setup-section setup-category-selection">
                        <p class="setup-section-label">1. Elige una categoría:</p>
                        <div class="category-options-container" id="categoryOptionsContainer">
                            <!-- Botones de categoría (generados por JS) -->
                        </div>
                    </div>

                    <hr class="setup-divider">

                    <!-- Sección Niveles -->
                    <div class="setup-section setup-level-selection">
                        <p class="setup-section-label">2. Elige un nivel de dificultad:</p>
                        <div class="level-options-container" id="levelOptionsContainer">
                            <!-- Botones de nivel (generados por JS) -->
                        </div>
                    </div>

                    <hr class="setup-divider">

                    <!-- Sección Código de Seguimiento -->
                    <div class="setup-section setup-tracking-code">
                        <p class="setup-section-label">3. Ingresa tu código de seguimiento:</p>
                        <input type="text" id="trackingCodeInput" placeholder="Ej: XX0001"
                            class="tracking-code-input">
                    </div>

                    <hr class="setup-divider">

                    <!-- Sección Número de Items -->
                    <div class="setup-section setup-item-count">
                        <p class="setup-section-label">4. ¿Cuántos items quieres resolver?</p>
                        <div class="setup-options">
                            <button class="setup-option-btn" data-count="10">10</button>
                            <button class="setup-option-btn" data-count="15">15</button>
                            <button class="setup-option-btn" data-count="20">20</button>
                        </div>
                    </div>

                    <!-- Nota -->
                    <p class="setup-note">(Las preguntas se seleccionarán aleatoriamente<span
                            id="categoryFilterNote"></span><span id="levelFilterNote"></span>)</p>
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
                            <span class="identifier"></span>
                        </div>
                        <div class="question-content">
                            <p class="question-text"></p>
                            <!-- === INICIO: Elementos de Ayuda (usa CLASES) === -->
                            <button class="help-btn" style="display: none;"> <!-- Inicialmente oculto -->
                                <i class="fas fa-question-circle"></i> Ayuda
                            </button>
                            <div class="help-text-container" style="display: none;">
                                <!-- El texto de ayuda se insertará aquí -->
                            </div>
                            <!-- === FIN: Elementos de Ayuda === -->
                        </div>
                        <div class="answers-panel">
                            <div class="options-container"></div>
                            <button class="check-answer-btn">Verificar Respuesta</button>
                            <p class="feedback-message" aria-live="polite"></p>
                        </div>
                    </div>
                    <div class="navigation-controls">
                        <span id="question-counter">Pregunta X de Y</span>
                        <button id="next-btn" class="quiz-action-btn next-btn" disabled>Siguiente »</button>
                        <button id="exit-quiz-btn" class="quiz-action-btn exit-btn">
                            <i class="fas fa-sign-out-alt"></i> Salir
                        </button>
                    </div>
                </div>

                <!-- ============================ -->
                <!-- Pantalla 3: Resultados       -->
                <!-- ============================ -->
                <div class="results-screen hidden" id="resultsScreen">
                    <h2>Resultados Finales</h2>
                    <div class="overall-stats">
                        <strong>Total General:</strong>
                        <span class="count-line">
                            <span id="total-correct" class="correct-count">0</span> Correctas /
                            <span id="total-incorrect" class="incorrect-count">0</span> Incorrectas
                        </span>
                        <div id="percentage-correct" class="percentage"></div>
                        <!-- Descomentar si quieres mostrar el código aquí -->
                        <!-- <p>Código de Seguimiento: <strong id="results-tracking-code"></strong></p> -->
                    </div>
                    <h3 class="category-stats-title">Detalle por Categoría:</h3>
                    <ul id="stats-list"></ul>
                    <h3 class="detailed-results-title">Resultados por Pregunta:</h3>
                    <div class="table-container">
                        <table class="results-table">
                            <thead>
                                <tr>
                                    <th scope="col">Pregunta ID</th>
                                    <th scope="col">Tu Respuesta</th>
                                    <th scope="col">Respuesta Correcta</th>
                                    <th scope="col">Resultado</th>
                                    <!-- Opcional: Columna para Código -->
                                    <!-- <th scope="col">Código</th> -->
                                </tr>
                            </thead>
                            <tbody id="results-table-body"></tbody>
                        </table>
                    </div>
                    <div class="results-actions">
                        <button id="new-quiz-btn" class="restart-button">Iniciar Nuevo Quiz</button>
                        <button id="download-btn" class="download-button">
                            <i class="fas fa-download"></i> Descargar Resultados
                        </button>
                    </div>
                </div>

@endsection
@section('js')
<script src="{{ asset('js/questions.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@endsection
