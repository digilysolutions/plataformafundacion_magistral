@extends('layouts.app-admin')

@section('title-header-admin')
Certificados
@endsection
@section('content-admin')
<h1>Sección de Certificados de Estudiantes (Datos Ficticios)</h1>

{{-- Área de Filtros (Solo Maquetación) --}}
<div class="card">
    <div class="card-header">
        Filtros (Solo Maquetación)
    </div>
    <div class="card-body">
        <form> {{-- Sin action o method, solo para maquetar --}}
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label class="sr-only" for="exam_type_fake">Tipo de Examen</label>
                    <select class="form-control mb-2" id="exam_type_fake" name="exam_type_fake">
                        <option value="">Seleccionar Tipo de Examen</option>
                        <option value="Nivel ITEMS">Nivel ITEMS</option>
                        <option value="Prueba PISA">Prueba PISA</option>
                        <option value="Pruebas Nacionales">Pruebas Nacionales</option>
                        <option value="Exámenes Diagnósticos">Exámenes Diagnósticos</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2" disabled>Filtrar</button> {{-- Deshabilitado --}}
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-secondary mb-2">Limpiar Filtros</button> {{-- Sin funcionalidad --}}
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        Listado de Estudiantes con Certificados (Datos Ficticios)
    </div>
    <div class="card-body">
        {{-- Generar datos ficticios directamente en Blade --}}
        @php
            $studentsWithCertificates = [
                [
                    'name' => 'Juan Pérez',
                    'certificates' => [
                        // Este certificado tiene fecha de emisión (emitido)
                        ['exam_name' => 'Nivel ITEMS', 'issued_at' => '2023-10-26', 'id' => 1, 'status' => 'issued'],
                        // Este certificado no tiene fecha de emisión (pendiente de solicitud/emisión)
                        ['exam_name' => 'Prueba PISA', 'issued_at' => null, 'id' => 2, 'status' => 'pending'],
                    ]
                ],
                [
                    'name' => 'María García',
                    'certificates' => [
                        ['exam_name' => 'Pruebas Nacionales', 'issued_at' => '2024-03-01', 'id' => 3, 'status' => 'issued'],
                    ]
                ],
                [
                    'name' => 'Carlos López',
                    'certificates' => [
                         // Varios certificados pendientes para Carlos López
                         ['exam_name' => 'Exámenes Diagnósticos', 'issued_at' => null, 'id' => 4, 'status' => 'pending'],
                         ['exam_name' => 'Nivel ITEMS', 'issued_at' => null, 'id' => 5, 'status' => 'pending'],
                         ['exam_name' => 'Prueba PISA', 'issued_at' => null, 'id' => 6, 'status' => 'pending'],
                    ]
                ],
                 [
                    'name' => 'Ana Rodríguez',
                    'certificates' => [] // Estudiante sin certificados ficticios
                ],
                 [
                    'name' => 'Pedro Gómez',
                    'certificates' => [
                         ['exam_name' => 'Prueba PISA', 'issued_at' => null, 'id' => 7, 'status' => 'pending'],
                    ]
                ],
            ];

            // Mapeo de nombres de examen a clases de modal
            $modalDataTargetMap = [
                'Nivel ITEMS' => '.certificate-level-items',
                'Prueba PISA' => '.certificate-pisa-diagnostic',
                'Pruebas Nacionales' => '.certificate-examen-nacional',
                'Exámenes Diagnósticos' => '.certificate-examen-diagnostic',
            ];

            // Simular paginación (esto es solo para maquetar, no funcional)
            $currentPage = 1;
            $perPage = 15;
            $totalItems = count($studentsWithCertificates);
            $totalPages = ceil($totalItems / $perPage);
        @endphp

        @if(empty($studentsWithCertificates))
            <p>No se encontraron estudiantes con certificados (Datos Ficticios).</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Estudiante</th>
                            <th>Examen(es) Certificado(s)</th>
                            <th>Fecha de Emisión</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studentsWithCertificates as $student)
                            <tr>
                                <td>{{ $student['name'] }}</td>
                                <td>
                                    @if(!empty($student['certificates']))
                                        <ul>
                                            @foreach($student['certificates'] as $certificate)
                                                <li>{{ $certificate['exam_name'] }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        Sin certificados
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($student['certificates']))
                                        <ul>
                                            @foreach($student['certificates'] as $certificate)
                                                @if($certificate['issued_at'])
                                                    <li>{{ \Carbon\Carbon::parse($certificate['issued_at'])->format('d/m/Y') }}</li>
                                                @else
                                                    <li>Pendiente</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                     @if(!empty($student['certificates']))
                                         <ul> {{-- Usamos una lista para alinear las acciones con los certificados --}}
                                            @foreach($student['certificates'] as $certificate)
                                                <li>
                                                    {{-- Lógica para mostrar el botón correcto basado en si hay fecha de emisión --}}
                                                    @if($certificate['issued_at'])
                                                         {{-- Botón para ver certificado (emitido) --}}
                                                         <a href="#" class="btn btn-sm btn-info disabled" aria-disabled="true">Ver Certificado</a>
                                                    @else
                                                        {{-- Botón para solicitar certificado (pendiente) --}}
                                                        @php
                                                            $examName = $certificate['exam_name'];
                                                            $modalTargetClass = $modalDataTargetMap[$examName] ?? '#'; // Obtener la clase del modal
                                                        @endphp
                                                         <button type="button"
                                                                 class="btn btn-sm btn-warning" {{-- ¡Quitamos disabled para que funcione el modal! --}}
                                                                 data-toggle="modal"
                                                                 data-target="{{ $modalTargetClass }}">
                                                            Solicitar {{ $examName }}
                                                         </button>
                                                    @endif
                                                </li>
                                            @endforeach
                                         </ul>
                                     @else
                                        N/A
                                     @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Simulación de links de paginación (solo maquetación) --}}
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        {{-- Añade más items si quieres simular más páginas --}}
                        <li class="page-item disabled"><a class="page-link" href="#">Siguiente</a></li>
                    </ul>
                </nav>
            </div>

        @endif
    </div>
</div>

<div class="modal fade certificate-level-items" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Solicitar certificado Nivel ITEMS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El Centro Educativo puede solicitar un certificado que un estudiante ha aprobado ITEMS de un determinado nivel de Pruebas PISA, Pruebas Nacionales o Exámenes Diagnóstico (Determinar Número Base).</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade certificate-pisa-diagnostic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Solicitar certificado Pruebas PISA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El Centro Educativo puede solicitar un certificado que un estudiante ha aprobado un examen de Pruebas PISA.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>



<div class="modal fade certificate-examen-nacional" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Solicitar Certificado Exámen Pruebas Nacionales </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El Centro Educativo puede solicitar un certificado que un estudiante ha aprobado un examen de Pruebas Nacionales.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade certificate-examen-diagnostic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Solicitar Certificado Exámenes Diagnósticos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El Centro Educativo puede solicitar un certificado que un estudiante ha aprobado un examen Diagnóstico.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
@endsection
