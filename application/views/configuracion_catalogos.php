<style>
.page-box{
    max-width:1100px;
    margin:auto;
    background:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,.1);
}
.page-box h3{
    text-align:center;
    margin-bottom:30px;
    color:#2c3e50;
}
.card{
    border-radius:8px;
    overflow:hidden;
}
.card-header{
    background:#2c3e50;
    color:white;
    font-weight:bold;
}
.table thead{
    background:#ecf0f1;
    font-weight:bold;
}
.table-success{
    background:#e9f7ef !important;
}
.table-danger{
    background:#fdecea !important;
}
.input-group input{
    border-radius:5px 0 0 5px;
}
.input-group button{
    border-radius:0 5px 5px 0;
}
.btn-sm{
    width:40px;
}
</style>

<div class="container mt-4">
<div class="page-box">

<h3>Configuración de Catálogos</h3>

<!-- ================= CARRERAS ================= -->
<div class="card mb-4">
  <div class="card-header">Carreras</div>
  <div class="card-body">

    <div class="input-group mb-3">
      <input id="carrera_nombre" class="form-control" placeholder="Nombre de carrera">
      <button class="btn btn-success" onclick="registrarCarrera()">Registrar</button>
    </div>

    <table class="table table-sm table-bordered table-hover">
      <thead>
        <tr>
          <th>Nombre</th>
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
  <div class="card-header">Turnos</div>
  <div class="card-body">

    <div class="input-group mb-3">
      <input id="turno_nombre" class="form-control" placeholder="Nombre del turno">
      <button class="btn btn-success" onclick="registrarTurno()">Registrar</button>
    </div>

    <table class="table table-sm table-bordered table-hover">
      <thead>
        <tr>
          <th>Nombre</th>
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
  <div class="card-header">Grados</div>
  <div class="card-body">

    <div class="input-group mb-3">
      <input id="grado_numero" type="number" class="form-control" placeholder="Número de grado">
      <button class="btn btn-success" onclick="registrarGrado()">Registrar</button>
    </div>

    <table class="table table-sm table-bordered table-hover">
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
</div>

<script>
// ==================== LISTADOS ====================
const load = (urlListar, urlToggle, tabla, campo, id) => {
  fetch(urlListar)
    .then(r => r.json())
    .then(j => {
      tabla.innerHTML = '';
      j.data.forEach(x => {

        const activo = x.activo == 1;
        const claseFila = activo ? 'table-success' : 'table-danger';

        tabla.innerHTML += `
        <tr class="${claseFila}">
          <td>${x[campo]}</td>
          <td>
            <button class="btn btn-danger btn-sm"
              onclick="toggle('${urlToggle}/${x[id]}')">❌</button>
          </td>
          <td>
            <button class="btn btn-success btn-sm"
              onclick="toggle('${urlToggle}/${x[id]}')">✔</button>
          </td>
        </tr>`;
      });
    });
};

// ==================== CARGAS ====================
load('<?= base_url("api/carreras") ?>','<?= base_url("api/carrera") ?>',tabla_carreras,'nombre_carrera','id_carrera');
load('<?= base_url("api/turnos") ?>','<?= base_url("api/turno") ?>',tabla_turnos,'nombre_turno','id_turno');
load('<?= base_url("api/grados") ?>','<?= base_url("api/grado") ?>',tabla_grados,'numero_grado','id_grado');

// ==================== TOGGLE ====================
function toggle(url){
 fetch(url,{method:'PUT'}).then(()=>location.reload());
}

// ==================== REGISTROS ====================
function registrarCarrera(){
 fetch('<?= base_url("api/carrera") ?>',{
  method:'POST',
  headers:{'Content-Type':'application/json'},
  body:JSON.stringify({nombre_carrera:carrera_nombre.value})
 }).then(()=>location.reload());
}

function registrarTurno(){
 fetch('<?= base_url("api/turno") ?>',{
  method:'POST',
  headers:{'Content-Type':'application/json'},
  body:JSON.stringify({nombre_turno:turno_nombre.value})
 }).then(()=>location.reload());
}

function registrarGrado(){
 fetch('<?= base_url("api/grado") ?>',{
  method:'POST',
  headers:{'Content-Type':'application/json'},
  body:JSON.stringify({numero_grado:grado_numero.value})
 }).then(()=>location.reload());
}
</script>

<?php $this->load->view('layout/footer'); ?>
