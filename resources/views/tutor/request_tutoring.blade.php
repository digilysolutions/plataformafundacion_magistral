@extends('layouts.app-admin')

@section('title-header-admin')
    Panel Tutor
@endsection

@section('content-admin')<!-- Select de especialidades -->
<div class="form-group">
    <label for="especialidadSelect">Selecciona una especialidad</label>
    <select id="especialidadSelect" class="form-control" disabled>
        <!-- Opciones se llenarán con JavaScript -->
    </select>
</div>

<!-- Botón para solicitar tutor -->
<div class="d-flex justify-content-center align-items-center mb-3">
    <button type="button" id="btnSolicitar" class="btn btn-primary" disabled data-toggle="modal" data-target="#modalConfirmacion">Solicitar tutor</button>
</div>

<!-- Tabla -->
<div class="card-body">
    <div class="table-responsive">
        <table id="datatable" class="table">
            <thead>
                <tr class="ligth">
                    <th>Especialidad</th>
                    <th>Nombre</th>
                    <th>Estado de Asignación</th>
                    <th>Estado de Solicitud</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Datos iniciales, puedes llenarlos desde el backend -->
                <tr data-especialidad="Matemática" data-asignacion="Asignado" data-solicitud="Confirmado">
                    <td>Matemática</td>
                    <td>Juan Pérez</td>
                    <td>Asignado</td>
                    <td>Confirmado</td>
                    <td></td>
                </tr>
                <tr data-especialidad="Español" data-asignacion="No asignado" data-solicitud="Solicitado">
                    <td>Español</td>
                    <td></td>
                    <td>No asignado</td>
                    <td>Solicitado</td>
                    <td>
                        <button class="btn btn-danger btn-sm btnCancelar">Cancelar</button>
                    </td>
                </tr>
                <tr data-especialidad="Ciencias Sociales" data-asignacion="Asignado" data-solicitud="Confirmado">
                    <td>Ciencias Sociales</td>
                    <td>Carlos López</td>
                    <td>Asignado</td>
                    <td>Confirmado</td>
                    <td></td>
                </tr>
                <tr data-especialidad="Ciencias Naturales" data-asignacion="No asignado" data-solicitud="Pendiente">
                    <td>Ciencias Naturales</td>
                    <td></td>
                    <td>No asignado</td>
                    <td>Pendiente</td>
                    <td>
                        <button class="btn btn-danger btn-sm btnCancelar">Cancelar</button>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Especialidad</th>
                    <th>Nombre</th>
                    <th>Estado de Asignación</th>
                    <th>Estado de Solicitud</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Modal de confirmación -->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title">Solicitud de Tutoría</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             <p>¿Está seguro de enviar la solicitud de tutor?</p>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
             <button type="button" class="btn btn-primary" id="confirmarSolicitud">Confirmar</button>
          </div>
       </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        // Lista de todas las especialidades
        const especialidades = [
            { nombre: 'Matemática', estado: 'No asignado', solicitud: 'Solicitado' },
            { nombre: 'Español', estado: 'No asignado', solicitud: 'Solicitado' },
            { nombre: 'Ciencias Sociales', estado: 'Asignado', solicitud: 'Confirmado' },
            { nombre: 'Ciencias Naturales', estado: 'No asignado', solicitud: 'Pendiente' }
        ];

        // Función para cargar todas las especialidades en el select
        function cargarEspecialidades() {
            $('#especialidadSelect').empty();

            especialidades.forEach(especialidad => {
                $('#especialidadSelect').append(
                    $('<option></option>')
                        .val(especialidad.nombre)
                        .text(especialidad.nombre)
                );
            });

            // Habilitar o deshabilitar el select y el botón
            if (tieneEspecialidadesDisponibles()) {
                $('#especialidadSelect').prop('disabled', false);
                $('#btnSolicitar').prop('disabled', false);
            } else {
                $('#especialidadSelect').prop('disabled', true);
                $('#btnSolicitar').prop('disabled', true);
            }
        }

        // Verifica si hay especialidades con estado "No asignado" y solicitud "Solicitado"
        function tieneEspecialidadesDisponibles() {
            return especialidades.some(e => e.estado === 'No asignado' && e.solicitud === 'Solicitado');
        }

        // Actualiza el select y botón en base a la tabla
        function actualizarSelect() {
            // Recalcular disponibles
            cargarEspecialidades();

            // Si ya hay una solicitud en la tabla, deshabilitar en el select
            let solicitudes = [];
            $('#datatable tbody tr').each(function() {
                const asignacion = $(this).data('asignacion');
                const solicitud = $(this).data('solicitud');
                const especialidad = $(this).data('especialidad');
                if (solicitud === 'Solicitado') {
                    solicitudes.push(especialidad);
                }
            });

            // Deshabilitar esas especialidades en el select
            $('#especialidadSelect option').each(function() {
                const valor = $(this).val();
                if (solicitudes.includes(valor)) {
                    $(this).prop('disabled', true);
                } else {
                    $(this).prop('disabled', false);
                }
            });
        }

        // Inicializa
        cargarEspecialidades();

        let especialidadSeleccionada = '';

        $('#especialidadSelect').on('change', function() {
            especialidadSeleccionada = $(this).val();
        });

        $('#btnSolicitar').on('click', function() {
            especialidadSeleccionada = $('#especialidadSelect').val();
            $('#modalConfirmacion').modal('show');
        });

        $('#confirmarSolicitud').on('click', function() {
            // Verificar que no exista ya en la tabla
            let existe = false;
            $('#datatable tbody tr').each(function() {
                if ($(this).data('especialidad') === especialidadSeleccionada) {
                    existe = true;
                    return false; // break
                }
            });
            if (existe) {
                alert('Esa especialidad ya tiene una solicitud o asignación.');
                $('#modalConfirmacion').modal('hide');
                return;
            }

            // Agregar fila con datos simulados
            const nombreTutor = 'Nuevo Tutor';

            $('#datatable tbody').append(`
                <tr data-especialidad="${especialidadSeleccionada}" data-asignacion="Asignado" data-solicitud="Solicitado">
                    <td>${especialidadSeleccionada}</td>
                    <td>${nombreTutor}</td>
                    <td>Asignado</td>
                    <td>Solicitado</td>
                    <td>
                        <button class="btn btn-danger btn-sm btnCancelar">Cancelar</button>
                    </td>
                </tr>
            `);

            // Actualizar select y botones
            actualizarSelect();

            $('#modalConfirmacion').modal('hide');
            $('#especialidadSelect').val('');
            especialidadSeleccionada = '';
            $('#btnSolicitar').prop('disabled', true);
        });

        // Mostrar botón cancelar solo cuando la solicitud está en estado "Solicitado"
        $('#datatable').on('mouseenter', 'tr', function() {
            const solicitud = $(this).data('solicitud');
            if (solicitud === 'Solicitado') {
                $(this).find('.btnCancelar').show();
            } else {
                $(this).find('.btnCancelar').hide();
            }
        }).on('mouseleave', 'tr', function() {
            $(this).find('.btnCancelar').hide();
        });

        // Alternativamente, puede establecer la visibilidad al agregar la fila
        $('#datatable tbody').on('DOMNodeInserted', 'tr', function() {
            const solicitud = $(this).data('solicitud');
            if (solicitud === 'Solicitado') {
                $(this).find('.btnCancelar').show();
            } else {
                $(this).find('.btnCancelar').hide();
            }
        });

        // Cancelar solicitud
        $('#datatable').on('click', '.btnCancelar', function() {
            const fila = $(this).closest('tr');
            const especialidad = fila.data('especialidad');

            // Eliminar fila
            fila.remove();

            // Actualizar select y botones
            actualizarSelect();
        });
    });
    </script>
@endsection
