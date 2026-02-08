

<div class="container mt-4">

<h3>Configuración de Catálogos</h3>

<!-- ================= CARRERAS ================= -->
<div class="card mb-4">
  <div class="card-header"><b>Carreras</b></div>
  <div class="card-body">

    <div class="input-group mb-3">
      <input id="carrera_nombre" class="form-control" placeholder="Nombre de carrera">
      <button class="btn btn-success" onclick="registrarCarrera()">Registrar</button>
    </div>

    <table class="table table-sm table-bordered">
      <thead>
        <tr>
          <th>Carrera</th>
          <th>Eliminar</th>
          <th>Activar</th>
        </tr>
      </thead>
      <tbody id="tabla_carreras"></tbody>
    </table>

  </div>
</div>

<!-- ================= TURNOS ================= -->
<div class="card mb-4">
  <div class="card-header"><b>Turnos</b></div>
  <div class="card-body">

    <div class="input-group mb-3">
      <input id="turno_nombre" class="form-control" placeholder="Nombre del turno">
      <button class="btn btn-success" onclick="registrarTurno()">Registrar</button>
    </div>

    <table class="table table-sm table-bordered">
      <thead>
        <tr>
          <th>Turno</th>
          <th>Eliminar</th>
          <th>Activar</th>
        </tr>
      </thead>
      <tbody id="tabla_turnos"></tbody>
    </table>

  </div>
</div>

<!-- ================= GRADOS ================= -->
<div class="card mb-4">
  <div class="card-header"><b>Grados</b></div>
  <div class="card-body">

    <div class="input-group mb-3">
      <input id="grado_numero" type="number" class="form-control" placeholder="Número de grado">
      <button class="btn btn-success" onclick="registrarGrado()">Registrar</button>
    </div>

    <table class="table table-sm table-bordered">
      <thead>
        <tr>
          <th>Grado</th>
          <th>Eliminar</th>
          <th>Activar</th>
        </tr>
      </thead>
      <tbody id="tabla_grados"></tbody>
    </table>

  </div>
</div>

</div>

<script>
// ==================== LISTADOS ====================
const load = (url, tabla, campo, id) => {
  fetch(url)
    .then(r => r.json())
    .then(j => {
      tabla.innerHTML = '';
      j.data.forEach(x => {
        tabla.innerHTML += `
        <tr>
          <td>${x[campo]}</td>
          <td>
            <button 
              class="btn btn-danger btn-sm"
              onclick="cambiarEstado('${url}/${x[id]}', 0)">
              ❌
            </button>
          </td>
          <td>
            <button 
              class="btn btn-success btn-sm"
              onclick="cambiarEstado('${url}/${x[id]}', 1)">
              ✔
            </button>
          </td>
        </tr>`;
      });
    });
};

load('<?= base_url("api/carreras") ?>', tabla_carreras, 'nombre_carrera', 'id_carrera');
load('<?= base_url("api/turnos") ?>', tabla_turnos, 'nombre_turno', 'id_turno');
load('<?= base_url("api/grados") ?>', tabla_grados, 'numero_grado', 'id_grado');

// ==================== REGISTROS ====================
function registrarCarrera(){
  fetch('<?= base_url("api/carrera") ?>', {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify({
      nombre_carrera: carrera_nombre.value
    })
  }).then(() => location.reload());
}

function registrarTurno(){
  fetch('<?= base_url("api/turno") ?>', {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify({
      nombre_turno: turno_nombre.value
    })
  }).then(() => location.reload());
}

function registrarGrado(){
  fetch('<?= base_url("api/grado") ?>', {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify({
      numero_grado: grado_numero.value
    })
  }).then(() => location.reload());
}

// ==================== ACTIVAR / DESACTIVAR ====================
function cambiarEstado(url, estado){
  fetch(url, {
    method: 'PUT',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify({estado})
  }).then(() => location.reload());
}
</script>

<?php $this->load->view('layout/footer'); ?>

