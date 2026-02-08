<style>
.form-box{
    max-width:600px;
    margin:auto;
    background:#ffffff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,.12);
}
.form-box h3{
    text-align:center;
    margin-bottom:25px;
    color:#2c3e50;
}
.form-box label{
    font-weight:600;
    margin-top:10px;
}
.form-control{
    border-radius:6px;
}
.btn-success{
    width:100%;
    font-weight:bold;
    padding:10px;
}
select:focus, input:focus{
    box-shadow:0 0 0 .15rem rgba(40,167,69,.25);
}
</style>

<div class="container mt-4">
<div class="form-box">

<h3>Registrar Grupo</h3>

<label>Carrera</label>
<select id="carrera" class="form-control mb-3">
    <option value="">Seleccione carrera</option>
</select>

<label>Turno</label>
<select id="turno" class="form-control mb-3">
    <option value="">Seleccione turno</option>
</select>

<label>Grado</label>
<select id="grado" class="form-control mb-3">
    <option value="">Seleccione grado</option>
</select>

<label>Grupo</label>
<input id="grupo" class="form-control mb-4" placeholder="Ej. A, B, C">

<button class="btn btn-success" onclick="guardar()">Guardar Grupo</button>

</div>
</div>

<script>
const carrera = document.getElementById('carrera');
const turno   = document.getElementById('turno');
const grado   = document.getElementById('grado');
const grupo   = document.getElementById('grupo');

// 🔹 CARRERAS
fetch('<?= base_url("api/carreras") ?>')
.then(r => r.json())
.then(j => {
    j.data.forEach(c => {
        carrera.innerHTML += `
        <option value="${c.id_carrera}">
            ${c.nombre_carrera}
        </option>`;
    });
});

// 🔹 TURNOS
fetch('<?= base_url("api/turnos") ?>')
.then(r => r.json())
.then(j => {
    j.data.forEach(t => {
        turno.innerHTML += `
        <option value="${t.id_turno}">
            ${t.nombre_turno}
        </option>`;
    });
});

// 🔹 GRADOS
fetch('<?= base_url("api/grados") ?>')
.then(r => r.json())
.then(j => {
    j.data.forEach(g => {
        grado.innerHTML += `
        <option value="${g.id_grado}">
            ${g.numero_grado}
        </option>`;
    });
});

function guardar() {

    if(!carrera.value || !turno.value || !grado.value || !grupo.value){
        alert('Todos los campos son obligatorios');
        return;
    }

    fetch('<?= base_url("api/grupo") ?>', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            id_carrera: carrera.value,
            id_turno: turno.value,
            id_grado: grado.value,
            grupo: grupo.value
        })
    })
    .then(r => r.json())
    .then(j => {
        alert(j.message);
        grupo.value = '';
    });
}
</script>

<?php $this->load->view('layout/footer'); ?>
