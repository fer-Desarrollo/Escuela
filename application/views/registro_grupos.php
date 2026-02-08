<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container mt-4">
<h3>Registrar Grupo</h3>

<select id="carrera" class="form-control mb-2"></select>
<select id="turno" class="form-control mb-2"></select>
<select id="grado" class="form-control mb-2"></select>
<input id="grupo" class="form-control mb-2" placeholder="Grupo">

<button class="btn btn-success" onclick="guardar()">Guardar</button>
</div>

<script>
const load = (url, el, txt) =>
fetch(url).then(r=>r.json()).then(j=>{
  j.data.forEach(x=>{
    el.innerHTML+=`<option value="${x.id_${txt}}">${x.nombre_${txt}||x.numero_grado}</option>`
  });
});

load('<?= base_url("api/carreras") ?>', carrera, 'carrera');
load('<?= base_url("api/turnos") ?>', turno, 'turno');
load('<?= base_url("api/grados") ?>', grado, 'grado');

function guardar(){
fetch('<?= base_url("api/grupo") ?>',{
method:'POST',
headers:{'Content-Type':'application/json'},
body:JSON.stringify({
 id_carrera:carrera.value,
 id_turno:turno.value,
 id_grado:grado.value,
 grupo:grupo.value
})
}).then(r=>r.json()).then(j=>alert(j.message));
}
</script>

<?php $this->load->view('layout/footer'); ?>
<?php $this->load->view('layout/scripts'); ?>
