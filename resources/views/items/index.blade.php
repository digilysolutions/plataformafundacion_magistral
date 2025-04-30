@extends('layouts.app-admin')

@section('title-header-admin')
    Panel Tutor
@endsection

@section('content-admin')
<div class="container my-4">

    <h2 class="mb-4">Solicitar Tutoría</h2>

    <!-- Select y botón -->
    <div class="mb-3 d-flex align-items-end gap-2">
        <div style="flex:1;">
            <label for="especialidadSelect" class="form-label">Especialidad</label>
            <select id="especialidadSelect" class="form-select" disabled></select>
        </div>
        <button id="solicitarBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSolicitar" disabled>Solicitar Tutor</button>
    </div>

    <!-- Tabla -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="tablaSolicitudes">
                <thead>
                    <tr>
                        <th>Especialidad</th>
                        <th>Nombre Tutor</th>
                        <th>Estado Asignación</th>
                        <th>Estado Solicitud</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- Modal confirmación -->
    <div class="modal fade" id="modalSolicitar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Confirmar Solicitud</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <p>¿Deseas solicitar tutoría para esta especialidad?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button id="confirmarBtn" type="button" class="btn btn-primary">Confirmar</button>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection

@section('js')
<script>
const especialidades = @json($especialidades);
let especialidadSeleccionada = null;

// Función para cargar en select solo las especialidades en estado "No asignado" y "Solicitado"
function cargarSelect() {
    const select = document.getElementById('especialidadSelect');
    select.innerHTML = '';

    // Filtrar especialidades en estado "No asignado" y "Solicitado"
    const habilitadas = especialidades.filter(e =>
        e.estado_asignacion === 'No asignado' && e.estado_solicitud === 'Solicitado'
    );

    habilitadas.forEach(e => {
        const option = document.createElement('option');
        option.value = e.nombre;
        option.textContent = e.nombre;
        select.appendChild(option);
    });

    // Controlar si habilitar o no
    const btnSolicitar = document.getElementById('solicitarBtn');
    if (habilitadas.length > 0) {
        select.disabled = false;
        select.value = habilitadas[0].nombre;
        btnSolicitar.disabled = false;
    } else {
        select.disabled = true;
        btnSolicitar.disabled = true;
    }

    // También cargamos la tabla con las especialidades que no están en el select
    cargarTablaConNoHabilitadas();
}

// Cargar en la tabla todas las especialidades que no están en el select (ya solicitadas o en otro estado)
function cargarTablaConNoHabilitadas() {
    const tbody = document.querySelector('#tablaSolicitudes tbody');
    tbody.innerHTML = '';

    especialidades.forEach(e => {
        // Solo las que NO están en el select (es decir, que no cumplen la condición para estar en el select)
        const enSelect = especialidades.filter(s => s.nombre === e.nombre && s.estado_asignacion === 'No asignado' && s.estado_solicitud === 'Solicitado').length > 0;
        if (!enSelect) {
            // Mostrar en la tabla si está en un estado distinto a "No asignado" y "Solicitado" (por ejemplo, "Asignado" o "Pendiente")
            // o si ya está solicitada
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${e.nombre}</td>
                <td>---</td>
                <td>${e.estado_asignacion}</td>
                <td>${e.estado_solicitud}</td>
                <td>
                    <button class="btn btn-info btn-sm revisarBtn">Revisar</button>
                </td>
            `;
            tbody.appendChild(tr);
        }
    });

    // Agregar evento a botón revisar
    document.querySelectorAll('.revisarBtn').forEach(btn => {
        btn.onclick = () => alert('Aquí puedes revisar detalles o corregir.');
    });
}

// Cuando carga la página
document.addEventListener('DOMContentLoaded', () => {
    cargarSelect();

    document.getElementById('especialidadSelect').addEventListener('change', cargarSelect);
    const modal = new bootstrap.Modal(document.getElementById('modalSolicitar'));
    document.getElementById('confirmarBtn').addEventListener('click', () => {
        const select = document.getElementById('especialidadSelect');
        const valor = select.value;
        const e = especialidades.find(e => e.nombre === valor);
        if (!e) return;

        const nombreTutor = 'Juan Tutor';

        // Crear fila en la tabla
        const tbody = document.querySelector('#tablaSolicitudes tbody');
        const tr = document.createElement('tr');

        tr.innerHTML = `
            <td>${e.nombre}</td>
            <td>${nombreTutor}</td>
            <td>${e.estado_asignacion}</td>
            <td>${e.estado_solicitud}</td>
            <td></td>
        `;

        // Añadir botón cancelar si está en "No asignado" y "Solicitado"
        if (e.estado_asignacion === 'No asignado' && e.estado_solicitud === 'Solicitado') {
            const btnCancelar = document.createElement('button');
            btnCancelar.className = 'btn btn-danger btn-sm';
            btnCancelar.textContent = 'Cancelar';
            btnCancelar.onclick = () => {
                tr.remove();
                // Poner la especialidad en estado inicial
                habilitarEspecialidad(e.nombre);
            };
            tr.querySelector('td:last-child').appendChild(btnCancelar);
        }

        tbody.appendChild(tr);

        // Actualizar estado en el array
        const index = especialidades.findIndex(x => x.nombre === e.nombre);
        if (index !== -1) {
            especialidades[index].estado_asignacion = 'Asignado';
            especialidades[index].estado_solicitud = 'Confirmado';
        }

        // Recargar select con todos los habilitados y la tabla
        cargarSelect();

        // Cerrar modal
        modal.hide();
    });
});

// Función para volver a poner en estado inicial
function habilitarEspecialidad(nombre) {
    const index = especialidades.findIndex(e => e.nombre === nombre);
    if (index !== -1) {
        especialidades[index].estado_asignacion = 'No asignado';
        especialidades[index].estado_solicitud = 'Solicitado';
    }
    cargarSelect();
}
</script>
@endsection